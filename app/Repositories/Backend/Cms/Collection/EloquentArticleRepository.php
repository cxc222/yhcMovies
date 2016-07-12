<?php
namespace App\Repositories\Backend\Cms\Collection;

use App\Exceptions\GeneralException;
use App\Models\Cms\Collection\Article as CollectionArticle;
use App\Models\Cms\Article\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPHtmlParser\Dom;

class EloquentArticleRepository implements ArticleRepositoryContract
{
    /**
     * @param  $per_page
     * @param  string $order_by
     * @param  string $sort
     * @param  $status
     * @return mixed
     */
    public function getArticlePaginated($per_page, $status = 0, $order_by = 'coll_id', $sort = 'desc')
    {
        $modelCls = CollectionArticle::orderBy($order_by, $sort);
        if($status && !empty($status)){
            $modelCls = $modelCls->where('status', $status);
        }
        return $modelCls->paginate($per_page);
    }


    /**
     * 检验通过采集的数据
     * @param $id
     * @return mixed
     */
    public function checkArticle($id)
    {
        $collectionArticle = CollectionArticle::findOrFail($id);
        if($collectionArticle->status == 2){
            //配对
            $article = Article::where('sort', $collectionArticle->coll_id)->firstOrFail();
            if($article->title == $collectionArticle->title
                || $article->down_url == $collectionArticle->down_url
                || $article->down_url_cyclone == $collectionArticle->down_url_cyclone
                || $article->down_url_xunlei == $collectionArticle->down_url_xunlei){
                return false;
            }
        }
        $dom = new Dom;
        $dom->load($collectionArticle->attribute);

        $attributeDivHtml = $dom->find('.span7 div');
        if($attributeDivHtml){
            $attrs = [];
            foreach ($attributeDivHtml as $attributeDiv){
                $attrs[] = $attributeDiv->text;
            }
            $attributeHtml = join("\n", $attrs);
        }else{
            $attributeHtml = $dom->find('.span7')->innerHTML;
            $attributeHtml = replaceWrap($attributeHtml);
        }
        $attrs = wrapTurnArray($attributeHtml);
        $datas = [];
        $datas['cover'] = $collectionArticle->cover;
        $datas['title'] = $collectionArticle->title;
        foreach ($attrs as $attrKey => $attrVal){
            switch ($attrKey){
                case '导演':
                    $datas['director'] = trim($attrVal);
                    break;
                case '上映日期':
                    $datas['release_date'] = trim($attrVal);
                    break;
                case '主演':
                    $actors = explode("/", trim($attrVal));
                    $actors = join(",", $actors);
                    $datas['actors'] = $actors;
                    break;
                case '制片国家/地区':
                    $datas['country'] = trim($attrVal);
                    break;
                case '语言':
                    $datas['language'] = trim($attrVal);
                    break;
                case '类型':
                    $datas['type'] = trim($attrVal);
                    break;
                case '片长':
                    $datas['film_long'] = trim($attrVal);
                    break;
            }
        }
        $datas['sort'] = $collectionArticle->coll_id;
        //content
        $datas['content'] = $collectionArticle->content;
        $datas['down_url'] = $collectionArticle->down_url;
        $datas['down_url_cyclone'] = $collectionArticle->down_url_cyclone;
        $datas['down_url_xunlei'] = $collectionArticle->down_url_xunlei;

        try{
            $article = Article::where('sort', $collectionArticle->coll_id)->firstOrFail();
            Article::where('id', $article['id'])->update($datas);
            $res = $article['id'];
        }catch (ModelNotFoundException $e){
            $res = Article::firstOrCreate($datas);
        }
        if($res){
            //更新本身的 采集源的状态
            CollectionArticle::where('id', $id)->update([
                'status' => 2
            ]);
        }
        return $res;
    }
}
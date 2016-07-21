<?php
namespace App\Repositories\Backend\Cms\Collection;

use App\Exceptions\GeneralException;
use App\Models\Cms\Collection\Article as CollectionArticle;
use App\Models\Cms\Article\Article;
use App\Models\Cms\Article\Personnel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPHtmlParser\Dom;
use App\Libraries\Douban;
use DB;

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
        $collectionArticle = CollectionArticle::find($id);
        if(!$collectionArticle){
            return false;
        }
        if($collectionArticle->status == 2){
            //配对
            $article = Article::where('sort', $collectionArticle->coll_id)->first();
            if(!$article){
                return false;
            }
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
        if(isset($attributeDivHtml[0]) && !empty($attributeDivHtml[0])){
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
                case '又名':
                    $datas['alias'] = join(",", explode("/", trim($attrVal)));
                    break;
            }
        }
        $datas['sort'] = $collectionArticle->coll_id;
        //content
        $datas['content'] = $collectionArticle->content;
        $datas['down_url'] = $collectionArticle->down_url;
        $datas['down_url_cyclone'] = $collectionArticle->down_url_cyclone;
        $datas['down_url_xunlei'] = $collectionArticle->down_url_xunlei;

        preg_match_all("/(?:《)(.*)(?:》)/i", $datas['title'], $alias);
        if(isset($alias) && !empty($alias)){
            //又名 有数据 调用 豆瓣电影的api - 通过 豆瓣的 api  更新本地的 电影信息
            $response = Douban::movie_search($alias[1][0]);
            if(isset($response->subjects[0]) && !empty($response->subjects[0])){
                $subject = Douban::movie_subject($response->subjects[0]->id);
                if($subject){
                    $datas['douban_id'] = $subject->id;
                    //导演
                    $directors = [];
                    foreach ($subject->directors as $director){
                        //获取 影片信息
                        $_data['name'] = $director->name;
                        if(isset($director->avatars) && isset($director->avatars->large)){
                            $_data['avatars'] = $director->avatars->large;
                        }
                        if($_data['name']){
                            $personnel = Personnel::where('name', $director->name)
                                ->first();
                            if($personnel){
                                Personnel::where('id', $personnel['id'])
                                    ->update($_data);
                                $_id = $personnel['id'];
                            }else{
                                $_id = Personnel::firstOrCreate($_data);
                            }
                        }
                        $directors[] = $_id;
                    }

                    //主演
                    $casts = [];
                    foreach ($subject->casts as $cast){
                        //获取 影片信息
                        $_data['name'] = $cast->name;
                        if(isset($cast->avatars) && isset($cast->avatars->large)){
                            $_data['avatars'] = $cast->avatars->large;
                        }
                        if($_data['name']){
                            $personnel = Personnel::where('name', $cast->name)
                                ->first();
                            if($personnel){
                                Personnel::where('id', $personnel['id'])
                                    ->update($_data);
                                $_id = $personnel['id'];
                            }else{
                                $_id = Personnel::firstOrCreate($_data);
                            }
                        }
                        $casts[] = $_id;
                    }
                    if(isset($subject->genres) && !empty($subject->genres)){
                        $datas['type'] = join("/", $subject->genres);
                    }
                    if(isset($subject->countries) && !empty($subject->countries)){
                        $datas['country'] = join("/", $subject->countries);
                    }
                    if(isset($subject->year) && !empty($subject->year)){
                        $datas['year'] = $subject->year;
                    }
                    if(isset($subject->aka) && !empty($subject->aka)){
                        $datas['alias'] = join(",", $subject->aka);
                    }
                    if(isset($subject->summary) && !empty($subject->summary)){
                        $datas['content'] = $subject->summary;
                    }
                    if(isset($subject->rating) && !empty($subject->rating)){
                        $datas['douban_rating'] = $subject->rating->average;
                    }
                    //director_ids
                    if($directors){
                        $datas['director_ids'] = json_encode($directors);
                    }
                    //actor_ids
                    if($casts){
                        $datas['actor_ids'] = json_encode($casts);
                    }
                }
            }
        }
        $article = Article::where('sort', $collectionArticle->coll_id)->first();
        if($article){
            Article::where('id', $article['id'])->update($datas);
            $res = $article['id'];
        }else{
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
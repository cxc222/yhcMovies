<?php
namespace App\Http\Controllers\Frontend\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Cms\Article\ArticleRepositoryContract;

class ArticleController extends Controller
{
    protected $articles;
    public function __construct(ArticleRepositoryContract $articles)
    {
        $this->articles = $articles;
    }

    public function detail($id){
        $article = $this->articles->find($id);
        if($article){
            $actors = explode(",", $article->actors);
            $article->actors = join(" / ", $actors);
        }
        return view('frontend.cms.detail')->withArticle($article);
    }

    /**
     * 最新列表
     * @param int $page
     * @return
     */
    public function newsList($page=1){
        $limit = 25;
        $articles = $this->articles->getArticlePaginated($limit);
        foreach ($articles as &$article){
            $article->type = explode("/", $article->type);
        }
        return view('frontend.cms.news')->withArticles($articles);
    }

    /**
     * 搜索
     */
    public function search($keyword, $page=1){
        $limit = 25;
        $articles = $this->articles->getArticlePaginated($limit, 1, $keyword);
        return view('frontend.cms.search')
            ->withKeyword($keyword)
            ->withArticles($articles);
    }

    /**
     * 根据 tag 检索列表
     * @param string $tag
     */
    public function searchTag($tag=''){
        $limit = 25;
        $articles = $this->articles->getArticlePaginated($limit, 1, '', $tag);
        return view('frontend.cms.search_tag')
            ->withTag($tag)
            ->withArticles($articles);
    }
}
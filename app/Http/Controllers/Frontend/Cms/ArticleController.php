<?php
namespace App\Http\Controllers\Frontend\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Article\ArticleRepositoryContract;

class ArticleController extends Controller
{
    public function detail(ArticleRepositoryContract $articles, $id){
        $article = $articles->find($id);
        if($article){
            $actors = explode(",", $article->actors);
            $article->actors = join(" / ", $actors);
        }
        return view('frontend.cms.detail')->withArticle($article);
    }
}
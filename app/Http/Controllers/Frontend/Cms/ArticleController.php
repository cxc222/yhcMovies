<?php
namespace App\Http\Controllers\Frontend\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Article\ArticleRepositoryContract;

class ArticleController extends Controller
{
    public function detail(ArticleRepositoryContract $articles, $id){
        return view('frontend.cms.detail')->withArticle($articles->find($id));
    }
}
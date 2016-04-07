<?php
namespace App\Http\Controllers\Frontend\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Article\ArticleRepositoryContract;

class ArticleController extends Controller
{
    function index(){
        print_r(213);
        die;
    }

    public function detail(ArticleRepositoryContract $articles, $id){
        return view('frontend.cms.detail')->withArticle($articles->find($id));
    }
}
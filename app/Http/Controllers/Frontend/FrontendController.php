<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Cms\Article\ArticleRepositoryContract;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    protected $articles;
    public function __construct(ArticleRepositoryContract $articles)
    {
        $this->articles = $articles;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = $this
            ->articles
            ->getArticlePaginated(25, 1);
        return view('frontend.index')
            ->withArticles($articles)
            ->withName('Victoria');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}

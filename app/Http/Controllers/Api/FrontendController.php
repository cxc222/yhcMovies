<?php

namespace App\Http\Controllers\Api;

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
        return $this->successJson("ok", $articles);
    }


    public function successJson($msg = "ok", $data = "")
    {
        return $this->showJson(1, $msg, $data);
    }

    /**
     * @param string $msg
     * @param string $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorJson($msg = "fail", $data = "")
    {
        return $this->showJson(0, $msg, $data);
    }

    /**
     * 输出json
     * @param string $msg
     * @param int $status
     * @param string $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function showJson($msg = "", $status = 1, $data = '')
    {
        return response()
            ->json([
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ]);
    }
}

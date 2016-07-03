<?php
namespace App\Http\Controllers\Backend\Cms\Collection;

use App\Http\Requests\Backend\Cms\Collection\CheckArticleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Collection\ArticleRepositoryContract;
use App\Repositories\Backend\Access\Permission\PermissionRepositoryContract;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepositoryContract
     */
    protected $articles;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    /**
     * @param ArticleRepositoryContract $articles
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(
        ArticleRepositoryContract $articles,
        PermissionRepositoryContract $permissions
    )
    {
        $this->articles = $articles;
        $this->permissions = $permissions;
    }

    function index(){
        return view('backend.cms.collection.index')
            ->withArticles($this->articles->getArticlePaginated(25, 1));
    }

    /**
     * 通过审核
     */
    public function check(CheckArticleRequest $request){
        if ($request->isMethod('post')) {
            $id = $request->input('id');
            if(!$id){
                return $this->ResponseError('缺少ID');
            }
            $res = $this->articles->checkArticle($id);
            if(!$res){
                print_r($res->id);
                die;
            }
            //if($article->status)
            return $this->ResponseSuccess('ok', $res->id);
        }
    }
}
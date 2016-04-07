<?php
namespace App\Http\Controllers\Backend\Cms\Article;

use App\Http\Requests\Backend\Cms\Article\CreateArticleRequest;
use App\Http\Requests\Backend\Cms\Article\EditArticleRequest;
use App\Http\Requests\Backend\Cms\Article\UpdateArticleRequest;
use App\Http\Requests\Backend\Cms\Article\StoreArticleRequest;
use App\Http\Requests\Backend\Cms\Article\DeleteArticleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Article\ArticleRepositoryContract;
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
        return view('backend.cms.index')
            ->withArticles($this->articles->getArticlePaginated(25, 1));
    }

    public function create(CreateArticleRequest $request)
    {
        return view('backend.cms.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $this->articles->create(
            $request->only('title','content', 'status')
        );
        return redirect()->route('admin.cms.articles.index')->withFlashSuccess(trans('alerts.backend.articles.created'));
    }

    /**
     * @param  $id
     * @param  EditArticleRequest $request
     * @return mixed
     */
    public function edit($id, EditArticleRequest $request)
    {
        return view('backend.cms.edit')
            ->withArticle($this->articles->find($id));
    }

    /**
     * @param  $id
     * @param  UpdateArticleRequest $request
     * @return mixed
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $this->articles->update($id, $request->all());
        return redirect()->route('admin.cms.articles.index')
            ->withFlashSuccess(trans('alerts.backend.articles.edited'));
    }

    /**
     * @param  $id
     * @param  DeleteUserRequest $request
     * @return mixed
     */
    public function destroy($id, DeleteArticleRequest $request)
    {
        $this->articles->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.articles.deleted'));
    }
}
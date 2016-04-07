<?php

namespace App\Repositories\Backend\Cms\Article;

use App\Exceptions\GeneralException;
use App\Models\Cms\Article\Article;
use App\Repositories\Frontend\Cms\Article\ArticleRepositoryContract as FrontendArticleRepositoryContract;

/**
 * Class EloquentArticleRepository
 * @package App\Repositories\Article
 */
class EloquentArticleRepository implements ArticleRepositoryContract
{
    /**
     * @var FrontendUserRepositoryContract
     */
    protected $article;

    /**
     * @param FrontendArticleRepositoryContract $article
     */
    public function __construct(
        FrontendArticleRepositoryContract $article
    )
    {
        $this->article = $article;
    }

    /**
     * @param  $per_page
     * @param  string $order_by
     * @param  string $sort
     * @param  $status
     * @return mixed
     */
    public function getArticlePaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc')
    {
        return Article::where('status', $status)
            ->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function create($input)
    {
        $article = $this->createArticleStub($input);

        if ($article->save()) {
            //保存成功后, 其他操作
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.cms.artics.create_error'));
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function destroy($id)
    {
        $article = $this->findOrThrowException($id);
        if ($article->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.cms.artics.delete_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $article = Article::withTrashed()->find($id);
        if (!is_null($article)) {
            return $article;
        }

        throw new GeneralException(trans('exceptions.backend.cms.artics.not_found'));
    }

    /**
     * @param  $id
     * @return mixed
     */
    public function find($id)
    {
        return Article::findOrFail($id);
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createArticleStub($input)
    {
        $article                    = new Article;
        $article->title              = $input['title'];
        $article->content             = $input['content'];
        $article->status            = isset($input['status']) ? 1 : 0;
        return $article;
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, $input)
    {
        $article                = $this->findOrThrowException($id);
        $article->title         = $input['title'];
        $article->content       = $input['content'];
        $article->status        = isset($input['status']) ? 1 : 0;

        if ($article->save()) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.cms.artics.update_error'));
    }
}

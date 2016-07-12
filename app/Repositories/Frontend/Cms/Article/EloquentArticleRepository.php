<?php

namespace App\Repositories\Frontend\Cms\Article;

use App\Exceptions\GeneralException;
use App\Models\Cms\Article\Article;
use Storage;
use Image;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentArticleRepository implements ArticleRepositoryContract
{
    public function __construct()
    {

    }

    /**
     * @param  $per_page
     * @param  $status
     * @return mixed
     */
    public function getArticlePaginated($per_page, $status = 1)
    {
        return Article::where('status', $status)
            ->orderBy('sort', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate($per_page);
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
}

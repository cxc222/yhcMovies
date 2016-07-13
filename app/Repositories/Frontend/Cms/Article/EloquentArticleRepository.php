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
    public function getArticlePaginated($per_page, $status = 1, $keyword='')
    {
        $articles = Article::where('status', $status);
        if($keyword){
            $articles = $articles->where('title', 'like', "%$keyword%");
        }
        $articles = $articles->orderBy('updated_at', 'desc')
            ->orderBy('sort', 'desc')
            ->paginate($per_page);
        foreach ($articles as &$article){
            $article->typeArray = explode("/", $article->type);
        }
        return $articles;
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

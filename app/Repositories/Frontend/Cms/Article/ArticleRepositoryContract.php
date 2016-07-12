<?php

namespace App\Repositories\Frontend\Cms\Article;

/**
 * Interface ArticleRepositoryContract
 * @package App\Repositories\User
 */
interface ArticleRepositoryContract
{
    public function getArticlePaginated($per_page, $status = 1);

    /**
     * @param  $id
     * @return mixed
     */
    public function find($id);
}

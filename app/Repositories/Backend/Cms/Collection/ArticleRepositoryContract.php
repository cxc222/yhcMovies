<?php
namespace App\Repositories\Backend\Cms\Collection;

interface ArticleRepositoryContract
{
    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @param  $status
     * @return mixed
     */
    public function getArticlePaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc');

    /**
     * 检验通过采集的数据
     * @param $id
     * @return mixed
     */
    public function checkArticle($id);
}
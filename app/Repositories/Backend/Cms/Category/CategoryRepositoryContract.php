<?php

namespace App\Repositories\Backend\Cms\Category;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface CategoryRepositoryContract
{
    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @param  $status
     * @return mixed
     */
    public function getCategoryPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param  $id
     * @param  $input
     * @return mixed
     */
    public function update($id, $input);
}

<?php

namespace App\Repositories\Backend\Cms\Category;

use App\Exceptions\GeneralException;
use App\Models\Cms\Category\Category;
use Storage;
use Image;

/**
 * Class EloquentArticleRepository
 * @package App\Repositories\Article
 */
class EloquentCategoryRepository implements CategoryRepositoryContract
{
    /**
     * @param  $per_page
     * @param  string $order_by
     * @param  string $sort
     * @param  $status
     * @return mixed
     */
    public function getCategoryList($status = 1, $order_by = 'id', $sort = 'asc')
    {
        $ParentList = Category::where('status', $status)
            ->where('pid',0)
            ->orderBy($order_by, $sort)
            ->get();
        $_list = [];
        foreach ($ParentList as $val){
            $nodes = $this->getChilds($val->id);
            $data['id'] = $val['id'];
            $data['text'] = $val['name'];
            $data['nodes'] = $nodes;
            $_list[] = $data;
        }
        return $_list;
    }

    private function getChilds($pid){
        $list = Category::where('status', 1)
            ->where('pid',$pid)
            ->orderBy('id', 'asc')
            ->get();
        $_list = [];
        foreach ($list as $val){
            $data['text'] = $val['name'];
            $data['id'] = $val['id'];
            $_list[] = $data;
        }
        return $_list;
    }

    /**
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function create($input)
    {

        $category                       = new Category;
        $category->name                 = $input['name'];
        $category->pid                  = $input['pid'] ? $input['pid'] : 0;
        $category->sort                 = isset($input['sort']) ? $input['sort'] : 255;
        $category->status               = isset($input['status']) ? 1 : 0;

        if ($category->save()) {
            //保存成功后, 其他操作
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.cms.category.create_error'));
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

        throw new GeneralException(trans('exceptions.backend.cms.category.delete_error'));
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
     * @param $id
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function update($id, $input)
    {
        $article                = $this->findOrThrowException($id);
        $article->title         = $input['title'];
        $article->cover         = $input['cover'];
        $article->country       = $input['country'];
        $article->year          = $input['year'];
        $article->release_date  = $input['release_date'];
        $article->director      = $input['director'];
        $article->actors        = $input['actors'];
        $article->content       = $input['content'];
        $article->status        = isset($input['status']) ? 1 : 0;

        if ($article->save()) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.cms.artics.update_error'));
    }

    /**
     * @return mixed
     */
    public function getParents()
    {

        return Category::orderBy('id', 'asc')
            ->get();
    }
}

<?php
namespace App\Http\Controllers\Backend\Cms\Category;

use App\Http\Requests\Backend\Cms\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Cms\Category\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Cms\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Access\Permission\PermissionRepositoryContract;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryContract
     */
    protected $categorys;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    public function __construct(
        CategoryRepositoryContract $categorys,
        PermissionRepositoryContract $permissions
    )
    {
        $this->categorys = $categorys;
        $this->permissions = $permissions;
    }

    function index(){
        $list = $this->categorys->getCategoryList();
        return view('backend.cms.category.index')
            ->with('list', json_encode($list));
    }

    public function create(CreateCategoryRequest $request)
    {
        return view('backend.cms.category.create')
            ->withParents($this->categorys->getParents());
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categorys->create($request->all());
        return redirect()->route('admin.cms.categorys.index')
            ->withFlashSuccess(trans('alerts.backend.categorys.created'));
    }
}
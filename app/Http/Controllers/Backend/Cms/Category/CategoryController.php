<?php
namespace App\Http\Controllers\Backend\Cms\Category;

use App\Http\Controllers\Controller;

use App\Repositories\Backend\Cms\Category\CategoryRepositoryContract;
use App\Repositories\Backend\Access\Permission\PermissionRepositoryContract;

class CategoryController extends Controller
{
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
        return view('backend.cms.category.index')
            ->withCategorys($this->categorys->getCategoryPaginated(25, 1));
    }
}
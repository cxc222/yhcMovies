<?php
namespace App\Models\Cms\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cms\Category\Traits\Attribute\CategoryAttribute;

class Category extends Model
{
    use SoftDeletes, CategoryAttribute;

    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'categorys';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * 指定是否模型应该被戳记时间。
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid',
        'name',
        'sort',
        'status'
    ];

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required|unique:posts|max:255',
            'pid' => 'required',
        ]);*/
    }
}
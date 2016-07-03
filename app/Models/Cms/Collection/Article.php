<?php
namespace App\Models\Cms\Collection;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cms\Collection\Traits\Attribute\ArticleAttribute;

class Article extends Model
{
    use SoftDeletes, ArticleAttribute;

    protected $table = 'coll_articles';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'attribute',
        'content',
        'coll_id',
        'down_url',
        'down_url_cyclone',
        'down_url_xunlei'
    ];
}
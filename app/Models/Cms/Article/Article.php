<?php
namespace App\Models\Cms\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cms\Article\Traits\Attribute\ArticleAttribute;

class Article extends Model
{
    use SoftDeletes, ArticleAttribute;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'cover',
        'country',
        'language',
        'type',
        'year',
        'release_date',
        'director',
        'actors',
        'content',
        'down_url',
        'down_url_cyclone',
        'down_url_xunlei',
        'view_cnt',
        'status',
        'sort',
        'created_at'
    ];
}
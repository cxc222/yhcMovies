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
}
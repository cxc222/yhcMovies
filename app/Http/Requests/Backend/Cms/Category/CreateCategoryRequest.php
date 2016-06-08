<?php

namespace App\Http\Requests\Backend\Cms\Category;

use App\Http\Requests\Request;

/**
 * Class CreateArticleRequest
 * @package App\Http\Requests\Backend\Cms\Article
 */
class CreateCategoryRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-categorys');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

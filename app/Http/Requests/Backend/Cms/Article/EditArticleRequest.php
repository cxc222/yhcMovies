<?php

namespace App\Http\Requests\Backend\Cms\Article;

use App\Http\Requests\Request;

/**
 * Class EditArticleRequest
 * @package App\Http\Requests\Backend\Cms\Article
 */
class EditArticleRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-articles');
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

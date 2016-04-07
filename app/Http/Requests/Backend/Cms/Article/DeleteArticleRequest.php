<?php

namespace App\Http\Requests\Backend\Cms\Article;

use App\Http\Requests\Request;

/**
 * Class DeleteArticleRequest
 * @package App\Http\Requests\Backend\Cms\Article
 */
class DeleteArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('delete-articles');
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

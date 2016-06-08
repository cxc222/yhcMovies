<?php

namespace app\Http\Requests\Backend\Cms\Category;

use App\Http\Requests\Request;

/**
 * Class StoreArticleRequest.
 */
class StoreCategoryRequest extends Request
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
            'name' => 'required|max:15'
        ];
    }
}

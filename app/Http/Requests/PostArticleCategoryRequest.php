<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostArticleCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'category_name'=>'required|min:2',
            //'category_type'=>'required',
            //'article_category_id' => 'exists:feature_article_category,id',
        ];
    }
}

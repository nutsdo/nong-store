<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostArticleRequest extends Request
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
            "category_id" => "required|digits_between:1,5",
            "title" => "required|between:2,50",
            //"author" => "required",
            "thumb_url" => "required",
            "is_published" => "boolean",
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostProductRequest extends Request
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
            "category_id"   => "required",
            "title"         => "required|between:2,50",
            "number"        => "required|digits_between:1,10",
            "market_price"  => "required|numeric",
            "thumb_url"     => "required",
            "is_show"       => "boolean",
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostCommunityCategoryRequest extends Request
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
            'category_name' => 'required|unique:bbs_category,id,'.$this->community_category,
            'father_id' => 'exists:bbs_categories,id',
        ];
    }
}

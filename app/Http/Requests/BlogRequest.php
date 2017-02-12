<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            // Create
            case 'POST':
            {
                return [
                    'slug'            => 'between:2,25|regex:/^[A-Za-z0-9\-\_]+$/|required|unique:blogs',
                    'name'            => 'between:2,20|alpha_dash|required|unique:blogs',
                    'description'     => 'max:250',
                    'cover'           => 'required',
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                $blog = Auth::guard('web')->user()->blog()->first();
                return [
                    'slug'            => 'between:2,25|regex:/^[A-Za-z0-9\-\_]+$/|required|unique:blogs,slug,' . $blog->id,
                    'name'            => 'between:2,20|alpha_dash|required|unique:blogs,name,' . $blog->id,
                    'description'     => 'max:250',
                    //'cover'           => 'image',
                ];
            }
            default:break;
        }



    }

    public function performUpdate(Blog $blog)
    {
        $blog->name = $this->input("name");
        $blog->slug = $this->input("slug");
        $blog->user_id = Auth::guard('web')->id();
        $blog->description = $this->input("description");
        $blog->cover = $this->input('cover');
        return $blog->save();
    }
}

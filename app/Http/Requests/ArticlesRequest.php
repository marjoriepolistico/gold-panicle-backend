<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
        {
            if( request()->routeIs('store') ) {
                return [
                    'title'         => 'required|string|max:255',
                    'content'       => 'string|max:1000|nullable',
                    'image'         => 'string|max:255|nullable',                           //'nullable|image|mimes:jpg,gif,png,bmp|max:5120',
                    'document'      => 'string|max:255|nullable',
                    'author_id'     => 'required|integer'
                ];
            }
            else if (request()->routeIs('article.title')) {
                return [
                    'title'     => 'required|string|max:255'
                ];
            } else if (request()->routeIs('article.content')) {
                return [
                    'content'   => 'string|max:255|nullable'
                ];
            } else if (request()->routeIs('article.image')) {
                return [
                    'image'     => 'string|max:255|nullable',                           //'nullable|image|mimes:jpg,gif,png,bmp|max:5120'
                ];
            } else if (request()->routeIs('article.document')) {
                return [
                    'document'  => 'string|max:255|nullable'
                ];
            }

        }
}

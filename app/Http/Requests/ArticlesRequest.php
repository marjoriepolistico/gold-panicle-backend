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
        if( request()->routeIs('article.store') ) {
                return [
                    'title'         => 'required|string|max:255',
                    'content'       => 'required|string|max:10000',
                    'file'          => 'mimes:jpg,bmp,png,pdf,doc,docx|max:5120|nullable',
                    'author_id'     => 'required|integer',
                ];
        }
        else if( request()->routeIs('article.title') ) {
                return [
                    'title'         => 'required|string|max:255',
                ];
        }
        else if( request()->routeIs('article.content') ) {
                return [
                    'content'         => 'required|string|max:10000',
                ];
        }
        else if( request()->routeIs('article.file') ) {
                return [
                    'file'        => 'file|mimes:jpg,bmp,png,pdf,doc,docx|max:5120',
                ];
        }
    }
}

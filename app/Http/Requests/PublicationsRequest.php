<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationsRequest extends FormRequest
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
                    'title' => 'required|string|max:255',
                    'description'  => 'string|max:255|nullable',
                    'image' => 'string|max:255|nullable',
                    'category' => 'string|max:255|nullable',
                ];
            }
            else if (request()->routeIs('publication.title')) {
                return [
                    'title' => 'required|string|max:255',
                ];
            } else if (request()->routeIs('publication.description')) {
                return [
                    'description'  => 'string|max:255|nullable',
                ];
            } else if (request()->routeIs('publication.image')) {
                return [
                    'image' => 'string|max:255|nullable',
                ];
            } else if (request()->routeIs('publication.category')) {
                return [
                    'category' => 'string|max:255|nullable'
                ];
            }
    }
}

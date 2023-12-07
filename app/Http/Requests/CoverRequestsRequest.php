<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverRequestsRequest extends FormRequest
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
                    'status'         => 'required|string|max:255',
                    'article_id'     => 'required|integer'
                ];
            }
            else if (request()->routeIs('update')) {
                return [
                    'status'     => 'required|string|max:255'
                ];
            
            }
        }
}
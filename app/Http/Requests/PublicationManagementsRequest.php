<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationManagementsRequest extends FormRequest
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
                    'cover_request_id' => 'required|integer',
                    'publication_id'  => 'required|integer',
                    'editor_id' => 'required|integer',
                    'action' => 'required|string|max:255',
                    'comment' => 'string|max:255|nullable',
                ];
            }
            else if (request()->routeIs('management.action')) {
                return [
                    'action' => 'required|string|max:255',
                ];
            }else if (request()->routeIs('management.comment')) {
                return [
                    'comment' => 'string|max:255|nullable',
                ];
            }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfilesRequest extends FormRequest
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
            if( request()->routeIs('profile.store') ) {
                return [
                    'firstname'     => 'required|string|max:255',
                    'lastname'      => 'required|string|max:255',
                    'role'          => 'required|string|max:255',
                    'email'         => 'required|string|email|unique:App\Models\UserProfile,email|max:255',
                    'password'      => 'required|min:8|confirmed',
                    'course'        => 'required|string|max:255|',
                    'year_level'    => 'required|integer',
                    'student_id'    => 'required|string|max:255',
                    'position'      => 'required|string|max:255',
                ];
            }
            else if( request()->routeIs('profile.login') ) {
                return [
                    'role'          => 'required|string|max:255',
                    'email'         => 'required|string|email|max:255',
                    'password'      => 'required|min:8',
                ];
            }
            else if( request()->routeIs('profile.password') ) {
                return [
                    'password'      => 'required|min:8|confirmed',
                ];
            }
            else if( request()->routeIs('profile.updateInfo') ) {
                return [
                    'firstname'     => 'required|string|max:255',
                    'lastname'      => 'required|string|max:255',
                    'email'         => 'required|string|email|unique:App\Models\UserProfile,email|max:255',
                    'course'        => 'required|string|max:255|',
                    'year_level'    => 'required|integer',
                    'student_id'    => 'required|string|max:255',
                    'position'      => 'required|string|max:255',
                ];
            }
            return [];

        }
}

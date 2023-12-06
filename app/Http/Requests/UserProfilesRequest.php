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
            if( request()->routeIs('store') ) {
                return [
                    'firstname' => 'required|string|max:255',
                    'lastname'  => 'required|string|max:255',
                    'middle_initial' => 'string|max:255|nullable',
                    'ext' => 'string|max:255|nullable',
                    'course' => 'required|string|max:255|',
                    'year_level' => 'required|integer'
                ];
            }
            else if (request()->routeIs('profile.firstname')) {
                return [
                    'firstname' => 'required|string|max:255'
                ];
            } else if (request()->routeIs('profile.lastname')) {
                return [
                    'lastname' => 'required|string|max:255'
                ];
            } else if (request()->routeIs('profile.middle_initial')) {
                return [
                    'middle_initial' => 'string|max:255|nullable'
                ];
            } else if (request()->routeIs('profile.ext')) {
                return [
                    'ext' => 'string|max:255|nullable'
                ];
            } else if (request()->routeIs('profile.course')) {
                return [
                    'course' => 'required|string|max:255|'
                ];
            } else if (request()->routeIs('profile.year_level')) {
                return [
                    'year_level' => 'required|integer'
                ];
            }

            // return[
            //     'firstname' => 'required|string|max:255',
            //     'lastname' => 'required|string|max:255',
            //     'middle_initial' => 'string|max:255|nullable',
            //     'ext' => 'string|max:255|nullable',
            //     'course' => 'required|string|max:255|',
            //     'year_level' => 'required|integer'
            // ];

        }

    }

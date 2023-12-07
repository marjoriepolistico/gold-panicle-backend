<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAccountsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // if( request()->routeIs('user.login') ) {
        //     return [
        //         'email'     => 'required|string|email|max:255',
        //         'password'  => 'required|min:8',
        //     ];
        // }
            return [
                'role'      => 'required|string|max:255',
                'email'     => 'required|string|email|unique:App\Models\UserAccount,email|max:255',
                'password'  => 'required|min:8|confirmed',
            ];
        // if( request()->routeIs('account.store') ) {
        //     return [
        //         'role'      => 'required|string|max:255',
        //         'email'     => 'required|string|email|unique:App\Models\UserAccount,email|max:255',
        //         'password'  => 'required|min:8|confirmed',
        //     ];
        // }
        // else if( request()->routeIs('account.update') ){
        //     return [
        //         'role'      => 'required|string|max:255'
        //     ];
        // }
        // else if( request()->routeIs('account.email') ){
        //     return [
        //         'email'     => 'required|string|email|max:255',
        //     ];
        // }
        // else if( request()->routeIs('account.password') ){
        //     return [
        //         'password'  => 'required|confirmed|min:8',
        //     ];
        // }
    }
}
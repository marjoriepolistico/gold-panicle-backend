<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\UserAccountsRequest;
use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login using the specified resource.
     */
    public function login(UserAccountsRequest $request)
    {
        $user = UserAccount::where('email', $request->email)->first();
    
        if ( !$user || !Hash::check($request->password, $user->password) ) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'user'      => $user,
            'token'     => $user->createToken($request->email)->plainTextToken
        ];

        return $response;
    }

    /**
     * Logout using the specified resource.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $response = [
            'message'   => 'Logout.'
        ];

        return $response;
    }

}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfilesRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login using the specified resource.
     */


    public function login(UserProfilesRequest $request)
    {
        $user = UserProfile::where('email', $request->email)->first();
    
        if ( !$user || !Hash::check($request->password, $user->password) ||  $user->role !== $request->role) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'email'     => $user,
            'token'     => $user->createToken($request->email)->plainTextToken
        ];
    
        return $response;
    }

    /**
     * Logout using the specified resource.
     */
    public function logout(UserProfilesRequest $request)
    {
        $request->user()->tokens()->delete();

        $response = [
            'message'   => 'Logout.'
        ];

        return $response;
    }

}

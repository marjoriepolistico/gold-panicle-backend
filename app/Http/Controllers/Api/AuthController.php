<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\UserAccountsRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfilesRequest;
use App\Models\UserAccount;
use App\Models\UserProfile;
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


    // /**
    //  * Login using the specified resource.
    //  */
    // public function register(UserAccountsRequest $userAccountRequest, UserProfilesRequest $userProfileRequest)
    // {
    //     // Validate the user profile request data
    //     $userProfileRequest->validated();

    //     // Validate the user account request data
    //     $userAccountRequest->validated();
        
    //     // Create a new user account
    //     $userAccount = UserAccount::create([
    //         'email' => $userAccountRequest->input('email'),
    //         'password' => Hash::make($userAccountRequest->input('password')),
    //         'role' => $userAccountRequest->input('role'),
    //     ]);

    //     // Create a corresponding user profile
    //     $userProfile = UserProfile::create([
    //         'user_account_id' => $userAccount->input('account_id'),
    //         'firstname' => $userProfileRequest->input('firstname'),
    //         'lastname' => $userProfileRequest->input('lastname'),
    //         'middle_initial' => $userProfileRequest->input('middle_initial'),
    //         'ext' => $userProfileRequest->input('ext'),
    //         'course' => $userProfileRequest->input('course'),
    //         'year_level' => $userProfileRequest->input('year_level'),
    //     ]);

    //     // Optionally, you might want to issue an API token here using Sanctum
    //     $token = $userAccount->createToken('auth_token')->plainTextToken;

    //     return response()->json(['message' => 'Registration successful', 'token' => $token], 201);
    // }


    // public function register(UserAccountsRequest $accountRequest, UserProfilesRequest $profileRequest)
    // {
    //     $validated = $accountRequest->validated();

    //     $user = UserAccount::create($validated);

    //     return $user;

    //     $validated = $profileRequest->validated();

    //     $userProfile = UserProfile::create($validated);

    //     return $userProfile;
    // }


}
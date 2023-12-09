<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountsRequest;
use App\Http\Requests\UserProfilesRequest;
use App\Models\UserAccount;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(UserAccountsRequest $accountRequest)
    {
        $validatedAccount = $accountRequest->validated();

        // Hash the password
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);

        // Create UserAccount
        $user = UserAccount::create($validatedAccount);

        return $user;
    }

    public function completeRegistration(UserProfilesRequest $profileRequest, string $accountId)
    {
        $user = UserAccount::findOrFail($accountId);

        $validatedProfile = $profileRequest->validated();
        $validatedProfile['account_id'] = $user->account_id;

        // Create UserProfile
        $userProfile = UserProfile::create($validatedProfile);

        return $userProfile;
    }

}

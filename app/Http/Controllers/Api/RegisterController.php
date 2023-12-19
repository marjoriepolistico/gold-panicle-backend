<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;
use App\Http\Requests\EditorialStaffsRequest;
use App\Http\Requests\UserAccountsRequest;
use App\Http\Requests\UserProfilesRequest;
use App\Models\Author;
use App\Models\EditorialStaff;
use App\Models\UserAccount;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerAccount(UserAccountsRequest $accountRequest)
    {
        $validatedAccount = $accountRequest->validated();

        // Hash the password
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);

        // Create UserAccount
        $user = UserAccount::create($validatedAccount);

        return $user;
    }

    public function registerProfile(UserProfilesRequest $profileRequest, string $accountId)
    {
        $user = UserAccount::findOrFail($accountId);

        $validatedProfile = $profileRequest->validated();
        $validatedProfile['account_id'] = $user->account_id;

        // Create UserProfile
        $userProfile = UserProfile::create($validatedProfile);

        return $userProfile;
    }

    protected function registerAuthor(UserAccountsRequest $request, UserAccount $userAccount)
    {
        $validatedAuthorData = $request->validated();
        // Include 'position' in author data
        $validatedAuthorData['position'] = $request->input('position');
        $validatedAuthorData['account_id'] = $userAccount->account_id; // Set the account_id
        $author = Author::create($validatedAuthorData);
    }


    public function registerEditorPos(EditorialStaffsRequest $request, string $accountId)
    {
        $user = UserAccount::findOrFail($accountId);

        $validated = $request->validated();

        $validated['account_id'] = $user->account_id;

        $author = EditorialStaff::create($validated);

        return $author;
    }
}
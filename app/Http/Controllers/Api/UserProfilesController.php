<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfilesRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfilesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  UserProfile::all();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserProfilesRequest $request){

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $userProfile = UserProfile::create($validated);

        return $userProfile;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserProfile::findOrFail($id);
    }


    
/**
     * Update the password of the specified resource in storage.
     */
    public function password(UserProfilesRequest $request, string $id)
    {
        $user = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user->password = Hash::make($validated['password']);

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserProfile::findOrFail($id);

        $user->delete();

        return $user;
    }
}
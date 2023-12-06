<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use App\Http\Requests\UserProfilesRequest;
use Illuminate\Http\Request;

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
    public function store(UserProfilesRequest $request)
    {
        $validated = $request->validated();

        // Retrieve the user profile based on the provided data
        $userProfile = UserProfile::where('firstname', $validated['firstname'])
                                ->where('lastname', $validated['lastname'])
                                ->where('middle_initial', $validated['middle_initial'])
                                ->where('ext', $validated['ext'])
                                ->where('course', $validated['course'])
                                ->where('year_level', $validated['year_level'])
                                ->first();

        // If the user profile doesn't exist, create it
        if (!$userProfile) {
            $userProfile = UserProfile::create($validated);
        }

        return $userProfile;
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserProfile::findOrFail($id);
    }


    public function firstname(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->firstname = $validated['firstname']; 

        $user_profile->save();

        return $user_profile;
    }

    public function lastname(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->lastname = $validated['lastname']; 

        $user_profile->save();

        return $user_profile;
    }

    public function middle_initial(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->middle_initial = $validated['middle_initial']; 

        $user_profile->save();

        return $user_profile;
    }

    public function ext(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->ext = $validated['ext']; 

        $user_profile->save();

        return $user_profile;
    }

    public function course(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->course = $validated['course']; 

        $user_profile->save();

        return $user_profile;
    }

    public function year_level(UserProfilesRequest $request, string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $validated = $request->validated();

        $user_profile->year_level = $validated['year_level']; 

        $user_profile->save();

        return $user_profile;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_profile = UserProfile::findOrFail($id);

        $user_profile->delete();

        return $user_profile;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAccount;
use App\Http\Requests\UserAccountsRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserAccount::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserAccountsRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = UserAccount::create($validated);

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserAccount::findOrFail($id);
    }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(UserRequest $request, string $id)
//     {
//         $user = User::findOrFail($id);

//         $validated = $request->validated();
 
//         $user->name = $validated['name'];
         
//         $user->save();

//         return $user;
//     }

    /**
     * Update the email of the specified resource in storage.
     */
    public function email(UserAccountsRequest $request, string $id)
    {
        $user = UserAccount::findOrFail($id);

        $validated = $request->validated();

        $user->email = $validated['email'];

        $user->save();

        return $user;
    }

    /**
     * Update the password of the specified resource in storage.
     */
    public function password(UserAccountsRequest $request, string $id)
    {
        $user = UserAccount::findOrFail($id);

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
        $user = UserAccount::findOrFail($id);

        $user->delete();

        return $user;
    }

//     /**
//      * Update the image of the specified resource from storage.
//      */
//     public function image(UserRequest $request, string $id)
//     {
//         $user = User::findOrFail($id);

//         if ( !is_null($user->image) ){
//             Storage::disk('public')->delete($user->image);
//         }

//         $user->image = $request->file('image')->storePublicly('images', 'public');

//         $user->save();

//         return $user;
//     }

//     /**
//      * Display a selection of the resource.
//      */
//     public function selection()
//     {
//         return User::select('id', 'name')
//                         ->get();
//     }
//
}

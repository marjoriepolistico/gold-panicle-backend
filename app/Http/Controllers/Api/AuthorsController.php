<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfilesRequest;
use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  Authors::all();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Authors::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Authors::findOrFail($id);

        $author->delete();

        return $author;
    }
}

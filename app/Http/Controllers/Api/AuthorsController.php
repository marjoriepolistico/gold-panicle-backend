<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorsRequest $request)
    {
        $validated = $request->validated();

        $author = Author::create($validated);

        return $author;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorsRequest $request, string $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validated();

        $author->position = $validated['position'];

        $author->save();

        return $author;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return $author;
    }
}

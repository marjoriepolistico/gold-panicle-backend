<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorLogsRequest;
use App\Models\AuthorLogs;
use Illuminate\Http\Request;

class AuthorLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AuthorLogs::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return AuthorLogs::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorLogsRequest $request)
    {
        $validated = $request->validated();

        $author = AuthorLogs::create($validated);

        return $author;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorLogsRequest $request, string $id)
    {
        $author = AuthorLogs::findOrFail($id);

        $validated = $request->validated();

        $author->action = $validated['action'];

        $author->save();

        return $author;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = AuthorLogs::findOrFail($id);

        $author->delete();

        return $author;
    }
}

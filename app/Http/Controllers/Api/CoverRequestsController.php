<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverRequestsRequest;
use App\Models\CoverRequest;
use Illuminate\Http\Request;

class CoverRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CoverRequest::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CoverRequest::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoverRequestsRequest $request)
    {
        $validated = $request->validated();

        $cvr = CoverRequest::create($validated);

        return $cvr;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(CoverRequestsRequest $request, string $id)
    {
        $cvr = CoverRequest::findOrFail($id);

        $validated = $request->validated();

        $cvr->position = $validated['status'];

        $cvr->save();

        return $cvr;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = CoverRequest::findOrFail($id);

        $author->delete();

        return $author;
    }
}


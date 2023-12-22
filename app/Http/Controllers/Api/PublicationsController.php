<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationsRequest;
use App\Models\Publications;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  Publications::all();
    }
    

    /**
     * Store a newly created resource in storage.
     */

    public function store(PublicationsRequest $request)
    {
        $validated = $request->validated();

        $publication = Publications::create($validated);

        return $publication;
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        return Publications::findOrFail($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationsRequest $request, string $id)
    {
        $validated = $request->validated();

        $publication = Publications::findOrFail($id);

        $publication->update($validated);

        return $publication;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publication = Publications::findOrFail($id);

        $publication->delete();

        return $publication;
    }
}

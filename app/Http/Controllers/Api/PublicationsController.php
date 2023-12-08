<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationsRequest;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publication::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Publication::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationsRequest $request)
    {
        $validated = $request->validated();

        $publication = Publication::create($validated);

        return $publication;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function title(PublicationsRequest $request, string $id)
    {
        $publication = Publication::findOrFail($id);

        $validated = $request->validated();

        $publication->title = $validated['title'];

        $publication->save();

        return $publication;
    }

    /**
     * Update the specified resource in storage.
     */
    public function description(PublicationsRequest $request, string $id)
    {
        $publication = Publication::findOrFail($id);

        $validated = $request->validated();

        $publication->description = $validated['description'];

        $publication->save();

        return $publication;
    }

    /**
     * Update the specified resource in storage.
     */
    public function image(PublicationsRequest $request, string $id)
    {
        $publication = Publication::findOrFail($id);

        $validated = $request->validated();

        $publication->image = $validated['image'];

        $publication->save();

        return $publication;
    }

    /**
     * Update the specified resource in storage.
     */
    public function category(PublicationsRequest $request, string $id)
    {
        $publication = Publication::findOrFail($id);

        $validated = $request->validated();

        $publication->category = $validated['category'];

        $publication->save();

        return $publication;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publication = Publication::findOrFail($id);

        $publication->delete();

        return $publication;
    }
}



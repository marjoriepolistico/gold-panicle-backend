<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationManagementsRequest;
use App\Models\PublicationManagement;
use Illuminate\Http\Request;

class PublicationManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PublicationManagement::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return PublicationManagement::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationManagementsRequest $request)
    {
        $validated = $request->validated();

        $management = PublicationManagement::create($validated);

        return $management;
    }

    /**
     * Update the specified resource in storage.
     */
    public function comment(PublicationManagementsRequest $request, string $id)
    {
        $management = PublicationManagement::findOrFail($id);

        $validated = $request->validated();

        $management->comment = $validated['comment'];

        $management->save();

        return $management;
    }

    /**
     * Update the specified resource in storage.
     */
    public function action(PublicationManagementsRequest $request, string $id)
    {
        $management = PublicationManagement::findOrFail($id);

        $validated = $request->validated();

        $management->action = $validated['action'];

        $management->save();

        return $management;
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $management = PublicationManagement::findOrFail($id);

        $management->delete();

        return $management;
    }
}

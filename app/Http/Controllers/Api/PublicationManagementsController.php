<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationManagementsRequest;
use App\Models\PublicationManagements;
use Illuminate\Http\Request;

class PublicationManagementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  PublicationManagements::all();
    }
    

    /**
     * Store a newly created resource in storage.
     */

    public function store(PublicationManagementsRequest $request)
    {
        $validated = $request->validated();

        $management = PublicationManagements::create($validated);

        return $management;
    }


    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        return PublicationManagements::findOrFail($id);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationManagementsRequest $request, string $id)
    {
        $validated = $request->validated();

        $management = PublicationManagements::findOrFail($id);

        $management->update($validated);

        return $management;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $management = PublicationManagements::findOrFail($id);

        $management->delete();

        return $management;
    }
}


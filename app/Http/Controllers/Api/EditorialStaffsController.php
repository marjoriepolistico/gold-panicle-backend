<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditorialStaffsRequest;
use App\Models\EditorialStaff;
use Illuminate\Http\Request;


class EditorialStaffsController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EditorialStaff::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EditorialStaff::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EditorialStaffsRequest $request)
    {
        $validated = $request->validated();

        $editor = EditorialStaff::create($validated);

        return $editor;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(EditorialStaffsRequest $request, string $id)
    {
        $editor = EditorialStaff::findOrFail($id);

        $validated = $request->validated();

        $editor->position = $validated['position'];

        $editor->save();

        return $editor;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editor = EditorialStaff::findOrFail($id);

        $editor->delete();

        return $editor;
    }
}


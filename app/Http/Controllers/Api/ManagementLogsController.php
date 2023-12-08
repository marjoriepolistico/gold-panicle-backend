<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagementLogsRequest;
use App\Models\ManagementLogs;
use Illuminate\Http\Request;

class ManagementLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ManagementLogs::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ManagementLogs::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagementLogsRequest $request)
    {
        $validated = $request->validated();

        $mlogs = ManagementLogs::create($validated);

        return $mlogs;
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(ManagementLogsRequest $request, string $id)
    {
        $mlogs = ManagementLogs::findOrFail($id);

        $validated = $request->validated();

        $mlogs->action = $validated['action'];

        $mlogs->save();

        return $mlogs;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mlogs = ManagementLogs::findOrFail($id);

        $mlogs->delete();

        return $mlogs;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EditorialStaffs;
use Illuminate\Http\Request;

class EditorialStaffsController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  EditorialStaffs::all();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EditorialStaffs::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editor = EditorialStaffs::findOrFail($id);

        $editor->delete();

        return $editor;
    }
}


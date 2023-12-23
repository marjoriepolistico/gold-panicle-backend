<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoverRequests;
use Illuminate\Http\Request;

class CoverRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  CoverRequests::all();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CoverRequests::findOrFail($id);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cover = CoverRequests::findOrFail($id);

        $cover->delete();

        return $cover;
    }
}

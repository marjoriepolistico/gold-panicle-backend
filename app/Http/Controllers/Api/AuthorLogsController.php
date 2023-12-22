<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuthorLogs;
use Illuminate\Http\Request;

class AuthorLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  AuthorLogs::all();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return AuthorLogs::findOrFail($id);
    }

}

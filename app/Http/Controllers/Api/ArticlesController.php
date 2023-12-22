<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  Articles::all();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    // public function store(ArticlesRequest $request){

    //     $validated = $request->validated();

    //     $article = Articles::create($validated);

    //     return $article;
        
    // }

    public function store(ArticlesRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->storePublicly('files', 'public');
            $validated['file'] = basename($path);
        }

        $article = Articles::create($validated);

        return $article;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Articles::findOrFail($id);
    }

    /**
     * Update the password of the specified resource in storage.
     */
    public function title(ArticlesRequest $request, string $id)
    {
        $validated = $request->validated();

        $title = Articles::findOrFail($id);

        $title->update($validated);

        return $title;
    }

    /**
     * Update the password of the specified resource in storage.
     */
    public function content(ArticlesRequest $request, string $id)
    {

        $validated = $request->validated();

        $content = Articles::findOrFail($id);

        $content->update($validated);

        return $content;
    }

    
    /**
     * Update the password of the specified resource in storage.
     */


    public function file(ArticlesRequest $request, string $id)
    {
        $article = Articles::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            if (!is_null($article->file)) {
                $oldFilePath = 'files/' . $article->file;
                Storage::disk('public')->delete($oldFilePath);
            }

            $path = $file->storePublicly('files', 'public');
            $article->file = basename($path);
            $article->save();
        }

        return $article;
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Articles::findOrFail($id);

        $article->delete();

        return $article;
    }


}

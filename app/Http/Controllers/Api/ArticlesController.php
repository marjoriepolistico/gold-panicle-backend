<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Article::findOrFail($id);
    }

    public function store(ArticlesRequest $request)
    {
        $validated = $request->validated();

        // Retrieve the user profile based on the provided data
        $article = Article::where('title', $validated['title'])
                                ->where('content', $validated['content'])
                                ->where('image', $validated['image'])
                                ->where('document', $validated['document'])
                                ->where('author_id', $validated['author_id'])
                                ->first();

        // If the user profile doesn't exist, create it
        if (!$article) {
            $article = Article::create($validated);
        }

        return $article;
    }

    /**
     * Update the specified resource (year level).
     */
    public function title(ArticlesRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->title = $validated['title'];

        $article->save();

        return $article;
    }

    /**
     * Update the specified resource (year level).
     */
    public function content(ArticlesRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->content = $validated['content'];

        $article->save();

        return $article;
    }

    /**
     * Update the specified resource (year level).
     */
    public function image(ArticlesRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->image = $validated['image'];

        $article->save();

        return $article;
    }

    /**
     * Update the specified resource (year level).
     */
    public function document(ArticlesRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->document = $validated['document'];

        $article->save();

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return $article;
    }
}

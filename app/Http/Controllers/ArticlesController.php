<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * shows a view that renders a list of resources
     */
    public function index()
    {
        $tagName = request('tag');
        
        if ($tagName) {
            $articles = [];

            $tag = Tag::where('name', $tagName)->first();
            if ($tag) {
                $articles = $tag->articles;
            }
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * shows a view for a single resource
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * shows a view to create a new resource (the form)
     */
    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Persists the data from the create form
     */
    public function store()
    {
        $this->validateArticle();
        $article = new Article(request(['title', 'body', 'excerpt']));
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    /**
     * shows a view to edit an existing resource
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * persists edited resource
     */
    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    /**
     * deletes a resource
     */
    public function destroy()
    {
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'max:255'],
            'excerpt' => ['required', 'max:255'],
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}

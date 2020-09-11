<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if (\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->orderBy('created_at', 'desc')->firstOrFail()->articles;
        } else {
            $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('articles.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validateArticle();
        $article = new Article(\request(['title', 'description', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach($request->input('tags'));

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());

    }

    protected function validateArticle()
    {
        return \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(User $user)
    {
        if (\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->latest()->firstOrFail()->articles()->paginate(5);
        } else {
            $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('articles.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function show(Article $article)
    {
        $user = $article->author;
        $comments = Comment::where('article_id', $article->id)->get();

        return view('articles.show', [
            'article' => $article,
            'comments' => $comments,
            'user' => $user
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
        $path = null;
        if (\request('background')) {
            $path = \request('background')->store('backgrounds');
        }
        $article = new Article(\request(['title', 'description', 'body']));
        $article->background = $path;
        $article->user_id = auth()->user()->id;
        $article->save();

        $article->tags()->attach($request->input('tags'));

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        abort_if(current_user() != $article->author, 403);

        return view('articles.edit', [
            'article' => $article,
            'tags' => $tags
        ]);

    }

    public function update(Request $request, Article $article)
    {
        abort_if(current_user() != $article->author, 403);

        $article->update($this->validateArticle());

        $article->tags()->sync($request->input('tags'));

        return redirect($article->path());

    }

    protected function validateArticle()
    {
        return \request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'background' => 'file',
            'body' => 'required|max:255',
            'tags' => 'exists:tags,id'
        ]);
    }
}

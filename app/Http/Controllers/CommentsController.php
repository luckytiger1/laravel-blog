<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $article_id = $request->input('article_id');

        $this->validateComment();

        $comment = new Comment();
        $comment->user_id = backpack_user()->id;
        $comment->article_id = $article_id;
        $comment->body = $request->input('body');
        $comment->save();

        return back();
    }

    public function validateComment()
    {
        return \request()->validate([
            'body' => 'required|max:255'
        ]);
    }
}

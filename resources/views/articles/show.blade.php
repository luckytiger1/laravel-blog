@extends('layout')

@section('header')
    <header class="masthead" style="background-image: url({{$article->background}})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="meta">Posted by
              <span>{{ $article->author->name }}</span>
              on {{ $article->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <article>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {{ $article->body }}
                </div>
            </div>
            <div class="row">

                <p>
                    @foreach($article->tags as $tag)
                        <a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>
                    @endforeach
                </p>
            </div>
        </div>
    </article>
    <hr>
    <x-comments :comments="$comments"></x-comments>
    <div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <form action="/comments" method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment" class="text-uppercase font-weight-bold">Leave a comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="article_id" id="article_id" value="{{ $article->id }}">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout')

@section('header')
    <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <span class="meta">Posted by
              <span>{{ $user->name }}</span>
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
    <div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <div class="form-group">
                <label for="comment" class="text-uppercase font-weight-bold">Leave a comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </div>
    </div>
@endsection

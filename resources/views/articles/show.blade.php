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
        <div class="container mb-3">
            <div class="row" style="margin-bottom: 100px">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {{ $article->body }}
                </div>
            </div>

            @can('edit', $article)
                {{--            @if(current_user()->id == ($article->user_id))--}}
                <a href="{{ route('article.edit', $article->id)  }}" class="btn btn-primary">Edit Post</a>
            @endcan
            {{--            @endif--}}
            <div class="row d-flex justify-content-between mt-4">
                @if(count($article->tags))
                    <div class="row d-flex flex-column">
                        <span>Tags:</span>
                        <p class="d-flex flex-column">
                            @foreach($article->tags as $tag)
                                <a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                    </div>
                @endif
                <div class="d-flex align-center">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
    </article>
    <hr>
    <x-comments :comments="$comments"></x-comments>
    <div class="container">
        <div class="col-lg-8 col-md-10 mx-auto">
            <hr>
            <form action="/comments" method="POST" id="comment-form">
                @csrf
                @honeypot
                <div class="form-group">
                    <label for="body" class="text-uppercase font-weight-bold">Leave a comment</label>
                    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="article_id" id="article_id" value="{{ $article->id }}">
                <button type="submit" class="btn btn-primary" id="comment-submit">Post Comment</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('header')
    <x-header :background="$article->background">
        <div class="post-heading">
            <h1>{{ $article->title }}</h1>
            <span class="meta">Posted by
              <span>{{ $article->author->name }}</span>
              on {{ $article->created_at->format('d M Y') }}</span>
        </div>
    </x-header>
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
                {{--            @auth--}}
                {{--                @if(current_user()->id == ($article->user_id) || backpack_user()->hasRole('admin'))--}}
                <a href="{{ route('article.edit', $article->id)  }}" class="btn btn-primary">Edit Post</a>
                {{--            @endcan--}}
                {{--                @endif--}}
                {{--            @endauth--}}
            @endcan
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
    @include('comments.create', compact('article'))
@endsection

@extends('layout')

@section('header')
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="header-title">
                        <h1>All articles</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @forelse($articles as $article)
                    <div class="post-preview">
                        <a href="/articles/{{ $article->id }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                        </a>
                        <h4 class="post-subtitle">
                            {{ $article->description }}
                        </h4>
                        <p class="post-meta">Posted by
                            <span class="font-weight-bold text-dark">{{ $article->author->name }}</span>
                            on <span
                                class="font-weight-bold text-dark">{{ $article->created_at->format('d M Y') }}</span>
                        </p>
                    </div>
                    <hr>
                @empty
                    <p>No relevant articles yet</p>
                @endforelse
            <!-- Pager -->
                @if(!is_null($articles))
                    <div class="clearfix">
                        {{ $articles->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

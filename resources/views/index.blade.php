@extends('layouts.app')

@section('header')
    <x-header background="img/home-bg.jpg">
        <div class="header-title">
            <h1>{{ $title }}</h1>
        </div>
    </x-header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1 class="pb-4 font-weight-bold">Latest posts</h1>
                @forelse($articles as $article)
                    <div class="post-preview">
                        <a href="{{ $article->path() }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                        </a>
                        <h3 class="post-subtitle">
                            {{ $article->description }}
                        </h3>
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
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="/articles">All posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection

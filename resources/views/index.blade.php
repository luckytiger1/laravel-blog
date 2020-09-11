@extends('layout')

@section('header')
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="header-title">
                        <h1>{{ $title }}</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
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
                        <a href="{{ $article->path() }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                        </a>
                        <h3 class="post-subtitle">
                            {{ $article->description }}
                        </h3>
                        <p class="post-meta">Posted by
                            <a href="#">Start Bootstrap</a>
                            on {{ $article->created_at->format('d M Y') }}</p>
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

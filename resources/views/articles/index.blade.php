@extends('layout')

@section('header')
    <header class="masthead" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="p-lg-5 pt-5" style="color: white">
                        <h1 >All articles</h1>
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
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="/articles/{{ $article->id }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                        </a>
                        <h3 class="post-subtitle">
                            {{ $article->description }}
                        </h3>
                        <p class="post-meta">Posted by
                            <a href="#">Start Bootstrap</a>
                            on September 24, 2019</p>
                    </div>
                    <hr>
            @endforeach
            <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection

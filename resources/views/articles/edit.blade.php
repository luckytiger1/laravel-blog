@extends('layout')

@section('header')
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Edit post</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="full-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <form method="POST" action="/articles/{{ $article->id }}">
                        @csrf
                        @method('PUT')

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="title">Post title</label>
                                <input type="text" class="form-control" placeholder="Post title" id="title"
                                       name="title" value="{{ $article->title }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="description">Post description</label>
                                <input type="text" class="form-control" placeholder="Post description" id="description"
                                       name="description" value="{{ $article->description }}">
                            </div>
                        </div>
{{--                        <div class="control-group">--}}
{{--                            <div class="form-group col-xs-12 floating-label-form-group controls">--}}
{{--                                <label for="background">Post background</label>--}}
{{--                                <input type="text" class="form-control" placeholder="Post background URL"--}}
{{--                                       id="background" name="background" value="{{ $article->background }}"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="body">Post body</label>
                                <textarea rows="5" class="form-control" placeholder="Post body message" id="body"
                                          name="body"
                                >{{ $article->body }}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        {{--                        <div id="success"></div>--}}
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Update post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

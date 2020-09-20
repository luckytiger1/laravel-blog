@extends('layout')

@section('header')
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="header-title">
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
                        @method('PATCH')

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="title">Post title</label>
                                <input type="text" class="form-control" placeholder="Post title" id="title"
                                       name="title" value="{{ $article->title }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="description">Post description</label>
                                <input type="text" class="form-control" placeholder="Post description" id="description"
                                       name="description" value="{{ $article->description }}">
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="background">Post background</label>
                                <input type="file" class="form-control-file" id="background" name="background">
                                @error('background')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="body">Post body</label>
                                <textarea rows="5" class="form-control" placeholder="Post body message" id="body"
                                          name="body"
                                >{{ $article->body }}</textarea>
                                <p class="help-block text-danger"></p>
                                @error('body')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="tags">Tags</label>
                                <div class="mb-2">
                                    <span>Tags</span>
                                </div>
                                <select
                                    class="form-control"
                                    id="tags"
                                    name="tags[]"
                                    multiple
                                >
                                    @foreach($article->tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>

                                @error('tags')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Update post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

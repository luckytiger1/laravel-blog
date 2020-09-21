@extends('layouts.app')

@section('header')
    <x-header background="img/contact-bg.jpg">
        <div class="header-title">
            <h1>Create new post</h1>
        </div>
    </x-header>
@endsection

@section('content')
    <div class="full-background">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <form method="POST" action="/articles" enctype="multipart/form-data">
                        @csrf

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="title">Post title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Post title"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    required>

                                @error('title')
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="description">Post description</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Post description"
                                       id="description"
                                       name="description"
                                       value="{{ old('description') }}"
                                       required>

                                @error('description')
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="background">Post background</label>
                                <input type="file" class="form-control-file" id="background" name="background">
                                @error('background')
                                <p class="text-danger">{{ $errors->first('background') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="body">Post body</label>
                                <textarea
                                    rows="5"
                                    class="form-control"
                                    placeholder="Post body message"
                                    id="body"
                                    name="body"
                                    required
                                >{{ old('body') }}</textarea>

                                @error('body')
                                <p class="text-danger">{{ $errors->first('body') }}</p>
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
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>

                                @error('tags')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Create post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

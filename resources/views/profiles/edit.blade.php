@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="/profile/{{ $user->id }}" class="new-post" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <h2>Edit Profile</h2>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                class="form-control
                @error('title') is-invalid @enderror"
                id="title" name="title"
                value="{{ $user->profile->title ?? old('title') }}">

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text"
                class="form-control
                @error('description') is-invalid @enderror"
                id="description" name="description"
                value="{{ $user->profile->description ?? old('description') }}">

            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text"
                class="form-control
                @error('url') is-invalid @enderror"
                id="url" name="url"
                value="{{ $user->profile->url ?? old('url') }}">

            @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file"
                class="form-control-file
                @error('image') is-invalid @enderror"
                id="image" name="image">

            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
</div>

@endsection

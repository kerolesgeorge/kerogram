@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="/posts" class="new-post" enctype="multipart/form-data">

        @csrf

        <h2>Add new Post</h2>

        <div class="form-group image-upload text-center">
            <label for="image">
                <i class="far fa-plus-square fa-3x"></i>
                <div class="file-name">No image selected</div>
            </label>
            <input type="file"
                class="form-control-file
                @error('image') is-invalid @enderror"
                id="image" name="image">

            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group">
            <textarea name="caption" id="caption" cols="30" rows="10"
                class="form-control @error('caption') is-invalid @enderror"
                placeholder="Caption"></textarea>

            @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Submit Post</button>

    </form>
</div>

@endsection

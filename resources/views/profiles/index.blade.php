@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" alt="Profile Image"
                class="rounded-circle img-fluid" style="width: 150px">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h1>{{ $user->username }}</h1>

                    <!-- Check if the logged in user in his own profile -->
                    @if (Auth::check())
                        @if(Auth::user()->id != $user->profile->user_id)
                            <follow-button
                                user-id="{{ $user->id }}"
                                follows="{{ $follows }}"
                            >
                            </follow-button>
                        @endif
                    @else
                        <follow-button
                            user-id="{{ $user->id }}"
                            follows="{{ $follows }}"
                        >
                        </follow-button>
                    @endif

                </div>

                @can('update', $user->profile)
                    <a href="/posts/create" class="btn btn-primary">Add Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit" class="btn btn-secondary mt-1 mb-2">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <!-- bootstrap css flexbox -->
                <div class="pr-3"><strong>{{ $postsCount }}</strong> posts</div>
                <div class="pr-3"><strong>{{ $followers }}</strong> followers</div>
                <div class="pr-3"><strong>{{ $following }}</strong> following</div>
            </div>
            <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row">
        @foreach($user->posts as $post)

            <div class="col-4 mb-3">
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="Image" class="img-fluid post-image">
                </a>
                <!-- <div class="card">
                    <img class="card-img-top" src="/storage/{{ $post->image }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $post->caption }}</p>
                    </div>
                </div> -->
            </div>

        @endforeach
    </div>
</div>
@endsection

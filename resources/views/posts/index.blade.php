@extends('layouts.app')

@section('content')

<div class="container">
    @auth
        @foreach($posts as $post)

            <div class="card mb-5" style="max-width: 690px; margin: auto">
                <div class="card-header p-3" style="background-color: #fff">
                    <img src="{{ $post->user->profile->profileImage() }}"
                        alt="Profile Image"
                        class="rounded-circle w-100"
                        style="max-width: 32px">
                    <span class="font-weight-bold text-dark ml-2">
                        <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a>
                    </span>
                </div>
                <a href="/posts/{{ $post->id }}">
                    <img class="img-fluid" src="/storage/{{ $post->image }}" alt="Post Image">
                </a>
                <div class="card-body">
                <span class="font-weight-bold text-dark ml-2">
                    <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a>
                </span>
                <span class="card-text">{{ $post->caption }}</span>
                </div>
            </div>

        @endforeach

        <!-- Pagination links -->
        <div style="max-width: 690px; margin: auto">
            <div class="pl-3">
                {{ $posts->links() }}
            </div>
        </div>
    @endauth

    @guest
        <script>
            window.location = '/welcome';
        </script>
    @endguest
</div>

@endsection

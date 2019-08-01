@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row postShow">
        <div class="col-8 p-0">
            <img src="/storage/{{ $post->image }}" alt="Post Image"
                class="img-fluid">
        </div>
        <div class="col-4 p-0" style="background-color:#fff">
            <div class="d-flex align-items-center p-3" style="border-bottom: 1px solid #e6e6e6">
                <div class="mr-3">
                    <img src="{{ $post->user->profile->profileImage() }}"
                        alt="Profile Image"
                        class="rounded-circle w-100"
                        style="max-width: 3rem">
                </div>
                <div>
                    <span class="lead font-weight-bold text-dark">
                        <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a>
                    </span>
                    <i class="fas fa-circle ml-1 mr-1" style="font-size: 0.2rem"></i>
                    <a href="#">Follow</a>
                </div>
            </div>
            <div class="mt-3 pt-2 pl-4">
                <span class="lead font-weight-bold text-dark">
                    <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a>
                </span>
                <span>{{ $post->caption }}</span>
            </div>
        </div>
    </div>
</div>

@endsection

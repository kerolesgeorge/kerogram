@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <i class="fas fa-camera-retro fa-10x" style="color: chocolate"></i>
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                &nbsp;
            </div>
            <div class="d-flex">
                <!-- bootstrap css flexbox -->
                <h2>Kerogram where you can share your photos!</h2>
            </div>
            <div class="pt-3 font-weight-bold">{{-- {{ $user->profile->title }} --}}</div>
            <div>{{-- {{ $user->profile->description }} --}}</div>
            <div><a href="#">{{-- {{ $user->profile->url }} --}}</a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2014/05/02/21/50/home-office-336378_960_720.jpg" alt=""
                class="img-fluid">
        </div>
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg" alt=""
                class="img-fluid">
        </div>
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg" alt=""
                class="img-fluid">
        </div>
    </div>
</div>
@endsection

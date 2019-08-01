<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Http\Resources\User as ResourceUser;

class UsersController extends Controller
{
    public function search()
    {
        //return request('keyword');
        //return ProfileResource::collection(User::where('username', 'like', "%'" . request('keyword') . "'%"));
        //dd($result);
        $result = \App\User::where('name', 'like', '%' . request('keyword') . '%')->with('profile')->get();
        return ResourceUser::collection($result);
    }
}

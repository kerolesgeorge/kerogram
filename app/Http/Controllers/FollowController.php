<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        //return $user->username;

        //The toggle function attaches and deataches the relationship
        return auth()->user()->following()->toggle($user->profile);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Profile as ProfileResource;

class ProfilesController extends Controller
{

    public function index() {
        return view('home');
    }


    public function show(User $user) {
        //$user = User::findOrFail($user);

        //check if logged in user follows the visited profile (if user is logged in)
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //setting and caching user stats
        $ttl = now()->addSeconds(30);

        $postsCount = Cache::remember('posts.count.' . $user->id , $ttl, function () use($user) {
            return $user->posts->count();
        });

        $followers =  Cache::remember('followers.count.' . $user->id , $ttl, function () use($user) {
            return $user->profile->followers->count();
        });

         $following =  Cache::remember('following.count.' . $user->id , $ttl, function () use($user) {
            return $user->following->count();
        });

        return view('profiles.index', [
            'user' => $user,
            'follows' => $follows,
            'postsCount' => $postsCount,
            'followers' => $followers,
            'following' => $following
        ]);
    }


    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }


    public function update(User $user) {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable | url',
            'image' => 'image | max: 2048'
        ]);

        if (request('image')) {
            //Store user uploads
            $imagePath = request('image')->store('profile', 'public');

            //Using intervention image resizing library
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $data['image'] = $imagePath;

        }

        //dd($data);
        $user->profile->update($data);
        return redirect("/profile/{$user->id}");
    }

}

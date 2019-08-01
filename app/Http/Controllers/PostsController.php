<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;

class PostsController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            $users = auth()->user()->following()->pluck('profiles.user_id');

            //latest() equal to orderBy('created_at', 'DESC')
            //$posts = Post::whereIn('user_id', $users)->latest()->get();

            //using with('user') to load the user only once, ('user') refers to the relationship in model
            $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(4);

            return view('posts.index', compact('posts'));
        } else {
            return redirect('/welcome');
        }
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required | min: 10 | max: 255',
            'image' => 'required | image | max: 2048'
        ]);

        //Store user uploads
        $imagePath = request('image')->store('uploads', 'public');

        //Using intervention image resizing library
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(960, 640);
        $image->save();

        $data['image'] = $imagePath;

        //Using user-posts relation
        //User has many posts relation in User model
        auth()->user()->posts()->create($data);

        return redirect('profile/' . auth()->user()->id);

        //$data['user_id'] = auth()->id();
        //Post::create($data);

        //dd($data);
    }

    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }
}

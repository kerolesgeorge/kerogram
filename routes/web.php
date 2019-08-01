<?php
use App\Http\Controllers\ProfilesController;
use App\Mail\NewUserWelcome;
use App\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email', function() {
    return new NewUserWelcome(auth()->user());
});

Route::get('/profile/{user}', 'ProfilesController@show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
Route::patch('/profile/{user}', 'ProfilesController@update');

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create')->middleware('auth');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/follow/{user}', 'FollowController@store');

Route::post('/search', 'UsersController@search');

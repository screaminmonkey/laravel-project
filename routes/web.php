<?php

use App\Http\Controllers\DadJokeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/', function() {
    $posts =[];
    if (auth()->check()) {
$posts = auth()->user()->usersCoolPosts()->latest()->get();
    }
    

//$posts =Post::where('user_id' , auth()->id())->get();
    return view('home', ['posts' => $posts]);
});


Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);

//blog post related routes

Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{posts}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{posts}', [PostController::class, 'actuallyUpdatePost']);

//dad jokes route


Route::get('/fetch-joke', [DadJokeController::class, 'fetch']);

Route::get('/dad-jokes', [DadJokeController::class, 'show']);

Route::post('/add-comment', [DadJokeController::class, 'addComment']);

Route::get('/dad-jokes', [DadJokeController::class, 'index']);
Route::post('/dad-jokes', [DadJokeController::class, 'store']);








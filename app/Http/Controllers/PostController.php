<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function actuallyUpdatePost(Request $request, Post $posts) {
        if (auth()->user()->id !== $posts['user_id']) {
return redirect('/');
}
   $incomingFields = $request->validate([
        'title' => 'required',
        'body' => 'required'
    ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
    $incomingFields['body'] = strip_tags($incomingFields['body']);

    $post->update($incomingFields);
    return redirect('/');

    }

    public function showEditScreen(Post $posts) {
    if (auth()->user()->id !== $posts['user_id']) {
    return redirect('/');
    }
    }


    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required' 
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect('/');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{

    // create post

    public function create(){
        return view('posts.create');
    }


    //Show single listing

    public function post(Posts $posts) {
        return view('posts.show', [
            'posts' => $posts
        ]);
    }

    // request

    public function postR(Request $request){
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'short' => 'required|min:20',
            'image' => 'image',
            'description' => 'required|min:20'
        ]);

        $data['user_id'] = auth()->id();
        $imagePath = request('image')->store('uploads', 'public');
        $data['image'] = $imagePath;



        auth()->user()->posts()->create($data);

//        Posts::create($data);

        return redirect('/posts/create')->with('message', 'Post created successful');
    }
}

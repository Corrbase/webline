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

    public function edit(Posts $posts){

        if($posts->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        return view('posts.edit', ['posts' => $posts]);
    }

    //Show single listing

    public function post(Posts $posts) {
//        if ($post->user_id == auth()->id());{
//            return redirect('/profile');
//        }

        if ($posts->user_id)
        return view('posts.show', [
            'posts' => $posts
        ]);
    }

    // request

    public function postR(Request $request){
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:50'],
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

    public function update(Request $request, Posts $posts){
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'short' => 'required|min:20',
            'description' => 'required|min:20'
        ]);


        if($request->hasFile('image')) {
            $imagePath = request('image')->store('uploads', 'public');
            $data['image'] = $imagePath;
        }

        $posts->update($data);
        return redirect('/profile')->with('message', 'update is successfully');
    }


}

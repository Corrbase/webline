<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //

    public function create(Request $request, Posts $posts)
    {
        $data = $request->validate ( [
            'comment' => [ 'required', 'min:5' ]
        ] );

        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $posts->id;
        $data['author'] = auth()->user()->name;

        Comment::create($data);

        return back();
    }
}

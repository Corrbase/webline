<?php

namespace App\Http\Controllers;


use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index() {
        return view('home.index', [
            'posts' => Posts::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }


}

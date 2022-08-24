<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function profile()
    {
        $posts = Posts::latest()->where('user_id', auth()->id())->paginate(5);

        return view('users.profile', ['posts' => $posts]);
    }

    // requests

    public function registerR(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['admin'] = false;

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/profile')->with('message', 'You are logged in');
    }

    public function loginR(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
//            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logoutR(Request $request){
        auth()->logout();


        return redirect('/')->with('message', 'You have been logged out!');
    }



}

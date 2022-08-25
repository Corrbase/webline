<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
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

    public function register_r(Request $request){

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

    public function login_r(Request $request)
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

    public function logout_r(Request $request){
        auth()->logout();


        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->only([
            'name',
        ]);

        $password = $request->get('password');
        if ($password)
        {
            if (Hash::check($request->get('oldPassword'), auth()->user()->password)) {
                $data['password'] = $password;
            } else {
                return back()->with('message', 'old password is wrong');
            }
        }

        auth()->user()->update($data);

        return back()->with('message', 'update is successfully');
    }



}

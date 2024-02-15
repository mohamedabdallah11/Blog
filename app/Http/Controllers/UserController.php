<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    public function register()
    {
        return view("users.register");
    }
    public function handleRegister()
    {
        request()->validate([
            'name' => ['required', 'min:8'],
            'email' => ['required', 'min:10','unique:users' ],
            'password'=>['required']
        ]);
        $name = request()->name;
        $email = request()->email;
        $password = request()->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        return to_route('users.login');
    }
    public function login()
    {
        return view('users.login');
    }
    public function handleLogin()
    {
        $email = request()->email;
        $password = request()->password;
        $user_data = array('email' => $email, 'password' => $password);

        if (Auth::attempt($user_data)) {
        return to_route('posts.index');
        } else {
            return "invalid";
        }
    }
    public function logOut(){
        Auth::logout();
        return to_route('users.login');
    }
    public function handleMessage(){
        return view ('users.handleMessage');
    }
}

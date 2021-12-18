<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        return redirect('/');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);

        if(Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ]))
        {
            $user= Auth::user();
            if($user['status'] == 1){
                Auth::logout();
                return view('pages.banned');
            }
            else
                return redirect('/posts');
             }
        return redirect()->back()->with('status', 'Неправильный логин или пароль');
        }
}

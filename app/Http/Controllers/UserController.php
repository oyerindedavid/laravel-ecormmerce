<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(){
        return view('users.login');
    }
    

    public function store(Request $request){
        $formField = $request->validate([
            'user_name' => ['required' , 'min:3'],
            'user_email' => ['required', 'email', Rule::unique('users', 'email')],
            'user_password' => 'required|confirmed|min:6'
        ]);

        $formField['password'] = bcrypt($formField['password']);

        $user = User::create($formField);

        auth()->login($user);
        $formField = '';

        return redirect()->intended('/index');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/index');
    }

    public function authenticate(Request $request){
       $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
       ]);

       if(auth()->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('index');
       }

       return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    
}

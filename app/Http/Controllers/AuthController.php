<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function signup(){
        return view("components.signup");
    }

    public function signin(){
        return view("components.signin");
    }

    public function login(){
    
        request()->validate([
            "email" => ['required','max:70',Rule::exists("users",'email')],
            "password" => ['required','min:8']
        ]);

        if(auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ])){
            return redirect('/blogs')->with('success',"welcome from creative coder : ".auth()->user()->name);
        }else{
            return redirect('/signin')->withErrors(['password'=>"your password is wrong"])->withInput();
        }
        // if($currentUser){
        //     if(Hash::check(request('password'), $currentUser->password)){
        //         auth()->login($currentUser);
        //         return redirect('/blogs')->with('success','welcome from creative coder');
        //     }else{
        //         return redirect('/signin')->withErrors(['password'=>"your password is wrong"]);
        //     }
        // }else{
        //     return redirect('/signin')->withErrors(['email'=>"your email not exits"]);

        // }
    }
    public function register(){
        
        $cleanData = request()->validate([
            "name" => ['required','max:50'],
            "username" => ['required','max:20',Rule::unique('users','username')],
            'email' => ['required','max:20',Rule :: unique('users','email')],
            'password' => ['required','min:8']
        ],[]);

        $user = User::create($cleanData);
        auth()->login($user);
        return redirect('/blogs')->with('success',"welcome from creative coder :".auth()->user()->name);
    }

    public function logout(){
        
        Auth::logout();
        return redirect('/signin');
    }
}

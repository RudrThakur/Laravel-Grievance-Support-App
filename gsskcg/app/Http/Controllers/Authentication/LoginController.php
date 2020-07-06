<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){

        return view('user.login');

    }

    public function store(){

        if(!auth()->attempt(request(['email', 'password']))){

            return back()->withErrors([
                'message' => 'Invalid Credentials'
            ]);
        
        }
        
        else{

            return redirect()->route('home');

        }
    }

    public function destroy(){

        auth()->logout();

        session()->flash('message', 'You Have been Logged Out Successfully');

        return redirect()->route('login');

    }
}

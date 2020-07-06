<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

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

            session()->flash('message', 'You Have been Logged In');

            if (User::where('id', auth()->id())->first()->role_id == 1)
            return redirect()->to('/admin/index');

            else
            return redirect()->to('/user/index');

        }
    }

    public function destroy(){

        auth()->logout();

        session()->flash('message', 'You Have been Logged Out Successfully');

        return redirect()->route('login');

    }
}

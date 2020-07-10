<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create(){
        
        return view('user.register');

    }

    public function store(){
        
        $this->validate(request(), [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ],
        [
            'role_id.required' => 'Role is required',
        ]
        );

        $user = User::create(request(['role_id', 'name', 'email', 'password']));

        auth()->login($user);

        session()->flash('message', 'You Account has been Registered Successfully');
        
        
        if (User::where('id', auth()->id())->first()->role_id == 1)
        return redirect()->to('/admin/index');
        
        else
        return redirect()->to('/user/index');

    }

}

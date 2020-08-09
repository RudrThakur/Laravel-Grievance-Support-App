<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {

        $user = auth()->user();

        return view('user.profile',
        [
            'user' => $user,
        ]);

    }

    public function create(){

        return view('user.edit-profile');

    }
}

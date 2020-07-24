<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function index(){

        return view('user.index');

    }
}

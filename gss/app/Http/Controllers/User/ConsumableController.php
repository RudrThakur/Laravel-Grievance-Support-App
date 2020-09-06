<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    public function create()
    {
        return view('user.consumable');
    }
}

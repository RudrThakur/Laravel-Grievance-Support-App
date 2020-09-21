<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CapitalEquipmentController extends Controller
{
    public function create()
    {
    	if (auth()->user()->can('create-ticket')){
        return view('user.capital-equipment');
    }else {return view('user.permission-error-page');}
    }
}

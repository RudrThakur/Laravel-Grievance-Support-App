<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CapitalEquipmentController extends Controller
{
    public function create()
    {
        return view('user.capital-equipment');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Profile;
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
        $profile = Profile::where('user_id', $user->id)->first();

        return view('user.profile',
        [
            'user' => $user,
            'profile' => $profile
        ]);

    }

    public function create(){

        return view('user.edit-profile');

    }

    public function store(){

        $profile = new Profile();

        $profile->user_id = auth()->user()->id;
        $profile->dob = request('user_dob');
        $profile->department = request('user_department');
        $profile->address = request('user_address');
        $profile->phone = request('user_phone');

        $profile->save();

        return redirect()->to('/profile-details');

    }
}

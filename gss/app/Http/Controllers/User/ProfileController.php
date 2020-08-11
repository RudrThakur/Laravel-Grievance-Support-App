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

    public function create()
    {

        $profile = Profile::where('user_id', auth()->user()->id)->first();

        return view('user.edit-profile', [

            'profile' => $profile ? $profile : null,

        ]);

    }

    public function store()
    {

        $profile = Profile::updateOrCreate(
            array(
              'user_id' => auth()->user()->id
            ),
            array(
                'user_id' => auth()->user()->id,
                'dob' => request('user_dob'),
                'department' => request('user_department'),
                'address' => request('user_address'),
                'phone' => request('user_phone')
            )
        );

        session()->flash('message', 'Profile Updated Successfully');

        return redirect()->to('/profile-details');

    }
}

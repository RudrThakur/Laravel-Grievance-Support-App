<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSettingController extends Controller
{
    public function index()
    {
        return view('user.account-settings');
    }

    public function destroy($userId)
    {

        $user = User::find($userId);

        $user->delete();

        session()->flash('message', 'Account Has Been Deleted Successfully');

        return redirect()->route('login');

    }
}

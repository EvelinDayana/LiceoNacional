<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;

class ProfileController extends Controller
{
    public function profile($iduser)
    {
        $user = User::find($iduser);
        return view('viewProfile',compact('user'));
    }

    public function friends($iduser)
    {
        $user = User::find($iduser);
        return view('viewListFriends',compact('user'));
    }
}

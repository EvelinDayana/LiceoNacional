<?php

namespace App\Http\Controllers;

use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
   
    public function createFriendship($iduserfollowed)
    {
        $iduserAuth =  Auth::id();

        $follow = new Follow();

        $follow->iduserfollower = $iduserAuth;
        $follow->iduserfollowed = $iduserfollowed;

        $follow->save();

        return response()->json(['response'=>true]);
    }

   
    public function deleteFriendship($iduserfollowed)
    {
        $iduserAuth =  Auth::id();

        $follow = Follow::where('iduserfollower', '=' , $iduserAuth)->where('iduserfollowed','=' , $iduserfollowed);
        $follow->delete();

        return response()->json(['response' => true]);
    }

    public function listFriendship($iduser)
    {
        $user = User::find($iduser);
        return view('listFriendship',compact('user'));
    }

    public function follower($iduser)
    {
        $user = User::find($iduser);
        return view('follower', compact("user"));
    }

    public function followed()
    {  
        return view('followed');
    }


    
}

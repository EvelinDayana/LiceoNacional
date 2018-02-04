<?php

namespace App\Http\Controllers;


use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
	public function createLike($idpostlike, Request $request)
	{
		

		$iduserlike = Auth::id();

		$like = new Like();

		$like->iduserlike = $iduserlike;
		$like->idpostlike = $idpostlike;

		$like->save();
		
		return response()->json(['response'=>true]);
	}

	public function deleteLike($idpostlike)
	{

		$iduserlike = Auth::id();

		$like = Like::where('idpostlike', '=' , $idpostlike)->where('iduserlike','=' , $iduserlike);

        $like->delete();

        return response()->json(['response' => true]);
        
	}
}

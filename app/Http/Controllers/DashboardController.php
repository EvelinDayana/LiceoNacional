<?php

namespace App\Http\Controllers;


use App\User;
use App\Follow;
use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function dashboard()
    {
   
  	    if (Auth::check()) {

  	    	$userId = Auth::id();
    		$user = User::find($userId);

    		$ownPost = DB::table('posts')
				->select('posts.*')
				->where('posts.idusertransmitter', '=', $userId);
		
			$posts = DB::table('posts')
			->join('follows' , 'follows.iduserfollowed' ,'=' ,'posts.iduserreceiver')
			->where('follows.iduserfollower', '=', $userId)
			->select('posts.*')
			->union($ownPost)
			->orderBy('created_at', 'desc')
			->get();

			$count_posts = count($posts);

			$follows = DB::table('follows as f1')
			->select('u.*' , 'f1.iduserfollower' , 'f1.iduserfollowed' , 'f1.id')
			->join('users as u' , 'f1.iduserfollower', '=' , 'u.iduser')
			->leftjoin('follows as f2' , function($leftjoin){
				$leftjoin->on('f2.iduserfollowed' , '=' , 'f1.iduserfollower')
						->on('f2.iduserfollower' ,'=', 'f1.iduserfollowed');
			})
			->where('f1.iduserfollowed' ,'=', $userId)
			->whereNull('f2.id')
			->limit(20)
			->get();

			$followers = $follows->toArray();

			$count_followers = count($followers);


			$followeds = DB::table('follows')
			->select('users.*')
			->join('users' , 'users.iduser'  , '=' , 'follows.iduserfollowed')
			->where('follows.iduserfollower', '=', $userId)
			->get();

            return view ('dashboard',compact('user','followers' , 'count_followers' , 'follows','followeds', 'posts' , 'count_posts' , 'userId'));

        }else{

            return view('signIn');

        }
    }
}

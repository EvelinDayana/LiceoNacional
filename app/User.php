<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Model implements Authenticatable
{

	use \Illuminate\Auth\Authenticatable;

	protected $primaryKey = 'iduser';

    public function posts(){
		
		return $this->hasMany('App\Post' , 'iduserreceiver')->orderBy('created_at', 'desc');
	}

	public function comments(){
		return $this->hasMany('App\Comment');
	}

	public function likes(){
		return $this->hasMany('App\Like');
	}

	public function followers(){

		return $this->hasMany('App\Follow');

	}
}

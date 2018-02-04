<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $primaryKey = 'idpost';
	

	public function user(){

    	return $this->belongsTo('App\User');   	

    }

    public function comments(){
		return $this->hasMany('App\Comment' , 'idpost')->orderBy('created_at', 'asc');
	}

	public function likes(){
		return $this->hasMany('App\Like' , 'idpost');
	}


}

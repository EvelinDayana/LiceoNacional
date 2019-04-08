<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class ProfileController extends Controller
{
    public function profile($iduser)
    {
        $user = User::find($iduser);
        $mensaje = User::find($iduser);
        return view('viewProfile')->with('user', $user)->with('mensaje', $user);
    }

    public function friends($iduser)
    {
        $user = User::find($iduser);
        return view('viewListFriends',compact('user'));
    }

    public function information($iduser)
    {
        $user = User::find($iduser);

        $courses = DB::table('courses')->get();
        $departaments = DB::table('states')->orderBy('name_state', 'ASC')->get();

        $users = DB::table('users')
        ->select('states.*' , 'cities.*')
        ->join('states' , 'states.id'  , '=' , 'users.departament')
        ->join('cities' , 'cities.id'  , '=' , 'users.city')
        ->where('users.iduser', '=', $iduser)
        ->get();

        return view('viewInformation',compact('user' , 'courses' , 'departaments' , 'users'));
    }

    protected $number_pagination = 7;

    public function events($iduser , Request $request)
    {
        $user = User::find($iduser);

        $events = DB::table('events')
        ->orderBy('startDate' , 'desc')
        ->paginate($this->number_pagination);

        return view('viewListEvents', compact('events'));
    }

    public function privacy(Request $request, $iduser)
    {
        $user = User::find($iduser);
        return view('privacy', compact('user'));
    }
}

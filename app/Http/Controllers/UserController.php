<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use App\User;
use Image;
use DateTime;

class UserController extends Controller
{
    
    public function createUser( Request $request)
    {

        $email = $request['email'];
        $nameUser = $request['name'];
        $lastname = $request['lastname'];
        $document = $request['document'];
        $password = bcrypt($request['passUser']);
        $birthdate = $request['date'];
        $phone = $request['phone'];
        $typeuser = $request['typeUser'];

 
        if ($typeuser == "Docente" || $typeuser == "Administrativo") {

            $sex = $request['sex'];
            $state = NULL;
            $emphasis = NULL;
        }


        if ($typeuser == "Estudiante") {
            $sex = "femenino";
            $state = $request['state'];
            $emphasis = $request['emphasis'];
        }

        $user = new User();

        $user->nameUser = $nameUser;
        $user->lastname = $lastname;
        $user->document = $document;
        $user->email = $email;
        $user->password = $password;
        $user->birthdate = $birthdate;
        $user->typeUser = $typeuser;
        $user->phone = $phone; 
        $user->sex = $sex;
        $user->state = $state; 
        $user->emphasis = $emphasis;

        $user->save();
        Auth()->login($user);

        return response()->json(['response' => 'success']);

    }

    public function signin(Request $request)
    {

        if(Auth::attempt(['email'=>$request['email'] , 'password'=>$request['password']]))
        {

            return response()->json(['response' => 'success']);

        }else{

            return response()->json(['response' => 'Usuario o contraseña incorrecta']);

        }

    }

    public function goProfile($iduser)
    {
        $user = User::find($iduser);
        return view('layouts.presentation',compact('user'));
    }

    public function create()
    {
        if (Auth::check()) {
            
            $user = Auth::user();

            return redirect('/');
        }else{
            return view('signUp');
        }
    }
    
    public function login()
    {
        if (Auth::check()) {
            
            $user = Auth::user();

            return redirect('/');
        }else{
            return view('signIn');
        }
    }

    public function updatePhoto(Request $request)
    {

        $iduser = $request['iduser-update-photo'];

        if (Auth::id())
        {

            if ($request->file('user-photo'))

            {
               $file = $request->file('user-photo');
               
                $filename = $file->getClientOriginalName();

                $fileExtension = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(120, 120)->save(public_path('/image/photo-user/'.$fileExtension));

                $user = Auth::user();
                $user->photo = $fileExtension;
                $user->save();

            }

        }


    return redirect('/perfil/'. Auth::id());
       
    }

    public function signout()
    {
        Auth::logout();
        return redirect ('/');
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $name = $request['name-update'];
        $lastname = $request['lastname-update'];

        $user->nameUser = $name;
        $user->lastname = $lastname;

        $user->save();

        return response()->json(['response' => true]);

    }


    public function update_password(Request $request)
    {
        $user = Auth::user();
        $old_password = $request['old_password'];

        $new_password = $request['new_password'];
        $password_confirmation = $request['password_confirmation'];

        if(Hash::check($old_password , $user->password))
        {
            if (Hash::check($new_password, $user->password)) {
                
                return response()->json(['response' => 'error']);
            }else{

                $user->password = bcrypt($new_password);
                $user->save();

                return response()->json(['response' => 'success']);

            }
 
            

        }else{
            
            return response()->json(['response' => 'password_fail']);
        }

    }


    


    
}

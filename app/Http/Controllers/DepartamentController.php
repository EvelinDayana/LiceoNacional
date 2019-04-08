<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    public function show($id_departament)
    {

        $sql =  DB::table('cities')->where('state_id' , $id_departament)->get();

        return response()->json($sql);

    }
}

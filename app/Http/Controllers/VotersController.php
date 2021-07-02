<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotersController extends Controller
{
    //
   
    public function index()
    {
        // $users = User::whereHas('roles', function ($role) {
        //     $role->where('name', '=', 'admin')->orWhere('name','=','super-admin');
        // })->get();

        // $users = User::all();
        // $data= ['users'=>$users];
        // return view('admin.Users.index', $data);
        return view('admin.Voters.CreateVoter');
    }

}

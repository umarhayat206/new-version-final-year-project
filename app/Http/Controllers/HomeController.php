<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user=Auth::user();
        // $userAreas=$user->areas->pluck('name')->toArray();

        //     $candidates = User::whereHas('roles', function ($role) {
        //         $role->where('name', '=', 'candidate');
        //     })->whereHas('areas', function ($areas)use($userAreas) {
        //         $areas->where('name', '=', $userAreas);
        //     })->get();
        //     return $candidates;

        
        
        
        // $area='NA-4';
        
        // $user=Auth::user();
        // $role=$user->roles;

        // if(Auth::user()->hasRole('candidate'))
        // {
        //    return view('home');
        // }
        // else
        // {
        //    return"<h1>false</h1>";
        // }

        
        
        return view('home');
    }
}

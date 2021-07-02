<?php

namespace App\Http\Controllers;

use App\Models\CandidateParty;
use App\Models\Party;
use App\Models\Role;
use App\Models\User;
use App\Models\Area;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Hash;


class CandidatesController extends Controller
{
    //
    public function index()
    {
        $candidates = User::whereHas('roles', function ($role) {
            $role->where('name', '=', 'candidate');
        })->get();

        $data= ['candidates'=>$candidates];
        return view('admin.Candidates.index',$data);
    }

    public function create()
    {
        $parties=Party::all();
        $areas=Area::all();
        $data=['parties'=>$parties,'areas'=>$areas];
        return view('admin.Candidates.CreateCandidate',$data);
    }
    public function store(Request $request)
    {
        // return $request->all();
         $user=new User();
        //  $user->password=Hash::make($request->password);
         //$user->fill($request->all());
        //its comment before
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->cnic=$request->cnic;
        $user->address=$request->address;
        $user->contact=$request->contact;
        $user->moto=$request->moto;
        //end here

        if ($imagefile = $request->file('image')) {
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/candidateImages', $name);
            $user->image = $name;
        }
        $user->save();
        //attach role
        $role=Role::find(3);
        $user->attachRole($role);

        //attach candidate araes
        $requestAreas=$request->areas;
        $user->areas()->attach($requestAreas);


        // now save the candidate party
        $partyName=Party::Find($request->party);
        $party=new CandidateParty();
        $party->party_id=$request->party;
        $party->party_name=$partyName->name;
        $user->candidateParty()->save($party);
        


    }
    public function edit($id)
    {   $user = User::findOrFail($id);
        $parties=Party::all();
        $areas=Area::all();
        //$rolesIds = $user->roles->pluck('id')->toArray();
        $userAreas=$user->areas->pluck('id')->toArray();
        $data=['user'=>$user,'parties'=>$parties,'areas'=>$areas,'userAreas'=>$userAreas];
        return view('admin.Candidates.EditCandidate',$data);
    }

    public function show($id)
    {
        $candidate=User::find($id);
        $data= ['candidate'=>$candidate];
        return view('admin.Candidates.ViewCandidate',$data);
        
    }
}

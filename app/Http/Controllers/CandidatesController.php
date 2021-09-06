<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateParty;
use App\Models\CandidatePosition;
use App\Models\CandidateProvinceArea;
use App\Models\Party;
use App\Models\Role;
use App\Models\User;
use App\Models\NationalArea;
use App\Models\ProvinceArea;
use App\Models\Position;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Illuminate\Support\Str;
use App\Models\Voter;



class CandidatesController extends Controller
{
    //
    public function index()
    {
        // $candidates = User::whereHas('roles', function ($role) {
        //     $role->where('name', '=', 'candidate');
        // })->orderBy('created_at')->get();
        $candidates=Candidate::all();
        $data= ['candidates'=>$candidates];
        return view('admin.Candidates.index',$data);
    }

    public function create()
    {
        $parties=Party::all();
        $nationalAreas=NationalArea::all();
        $provinceAreas=ProvinceArea::all();
        $positions=Position::all();
        $data=['parties'=>$parties,'nationalAreas'=>$nationalAreas,'provinceAreas'=>$provinceAreas,'positions'=>$positions];
        return view('admin.Candidates.CreateCandidate',$data);
    }
    public function store(Request $request)
    {
       
        // return $request->all();
         
        //important work start here
        // foreach($request->position as $position)
        // {
        //    if($position==1)
        //    {
        //        echo "umar hayat 1";
        //    }
        // }
        //  return ; 
        // important work end here

        // $roles = Role::find([3,4]);
        // $user=User::find(8);
        // $user->detachRoles($user->roles);
        // for ($i = 3; $i < 5; $i++) {
        //     $role = Role::find($i);
        //     // echo $role;
        //     $user->attachRole($role);
        //     //echo $role->id."<br>";
        // }
        
        // return "done";
        // $user->attachRole($roles);
        // return $roles;
        
       
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $random = Str::random(8);
        $password=Hash::make($random);
        $user->password = $password;
        $user->cnic=$request->cnic;
        $user->address=$request->address;
        $user->contact=$request->contact;
        if ($imagefile = $request->file('image')) {
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/userImages', $name);
            $user->image = $name;
        }
        $user->save();

        for ($i = 3; $i < 5; $i++) {
            $role = Role::find($i);
            $user->attachRole($role);
        }
        //comment before
        // $requestAreas=$request->areas;
        // $user->areas()->attach($requestAreas);
        // now save the candidate party
        // end here

        // comment on 13-7-21 5:59
        // $partyName=Party::Find($request->party);
        // $party=new CandidateParty();
        // $party->party_id=$request->party;
        // $party->party_name=$partyName->name;
        // $user->candidateParty()->save($party);
        // end here

        // also saving as voter 
        
        $voter=new Voter();
        $voter->national_area_id=$request->votingNationalArea;
        $voter->province_area_id=$request->votingProvinceArea;
        $user->voters()->save($voter);

        $candidate=new Candidate();
        $candidate->is_open=$request->open;
        $candidate->party_id=$request->party;
        $candidate->is_open=$request->open;
        // $candidate->voter_id=$voter->id;
        $candidate->moto=$request->moto;
        $user->candidates()->save($candidate);

        foreach($request->position as $position)
        {
           
            $candidate->positions()->attach($position);
            if($position==1)
            {
                foreach($request->electionNationalArea as $area)
              {
            
                $candidate->nationals()->attach($area);

              }
               
            }
            if($position==2)
            {
              foreach($request->electionProvinceArea as $area)
              {
            
                $candidate->provinces()->attach($area);

               }
              
            }


        }
        
         Alert::success('Success','Candidate Created Successfully!'); 
       return redirect()->route('candidates.index');


    }
    public function edit($id)
    {   
        $parties=Party::all();
        $nationalAreas=NationalArea::all();
        $provinceAreas=ProvinceArea::all();
        $positions=Position::all();
        $candidate=Candidate::findOrFail($id);
        // $voter=Voter::where('user_id','=',$candidate->user_id)->get();
        // return $voter[2];
        $data=['candidate'=>$candidate,'parties'=>$parties,'nationalAreas'=>$nationalAreas,'provinceAreas'=>$provinceAreas,'positions'=>$positions];
        return view('admin.Candidates.EditCandidate',$data);
    }

    public function show($id)
    {
        $candidate=User::findOrFail($id);
        $data= ['candidate'=>$candidate];
        return view('admin.Candidates.ViewCandidate',$data);
        
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $image=$user->image;
        if (File::exists(public_path('images/candidateImages/'.$image))) {
            File::delete(public_path('images/candidateImages/'.$image));
        }
        //unlink($image);
        $user->delete();
        return response()->json(['status'=>'Candidate deleted Successfully']);
    }
}

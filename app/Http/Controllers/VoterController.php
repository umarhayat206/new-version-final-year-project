<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterRequest;
use App\Mail\VoterMail;
use Illuminate\Http\Request;
use App\Models\NationalArea;
use App\Models\ProvinceArea;
use App\Models\Role;
use App\Models\User;
use App\Models\Voter;
use App\Models\VoterArea;
use Hash;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class VoterController extends Controller
{
    //

    public function index()
    {
        // $voters = User::whereHas('roles', function ($role) {
        //     $role->where('name', '=', 'voter');
        // })->get();

        // $voters = User::whereHas('voters')->get();

        $voters=Voter::all();
        $data= ['voters'=>$voters];
        return view('admin.Voters.index',$data);
    }
    public function create()
    {
        $nationalAreas=NationalArea::all();
        $provinceAreas=ProvinceArea::all();
        $data=['nationalAreas'=>$nationalAreas,'provinceAreas'=>$provinceAreas];
        return view('admin.Voters.Create',$data);
    }
    public function store(StoreVoterRequest $request)
    {  
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
        //attach role
        $role=Role::find(4);
        $user->attachRole($role);
        
        $voter=new Voter();
        $voter->national_area_id=$request->nationalArea;
        $voter->province_area_id=$request->provinceArea;
        $user->voters()->save($voter);

      
        $details=[
            'title'=>'You are Registerd Voter now in the system',
            'email'=>$request->email,
            'password'=>$random,
            'na'=>'NA-'.$request->nationalArea,
            'pa'=>'PA-'.$request->provinceArea,
          ];
          Mail::to($request->email)->send(new VoterMail($details));
        return redirect()->route('voters.index')->with('success', 'Voter Created Successfully');
        //  return $random;
        //return redirect()->route('voters.index');

    }
    public function edit($id)
    {   
        $voter = Voter::findOrFail($id);
        // $areas=Area::all();
        // $userAreas=$user->areas->pluck('id')->toArray();
        $nationalAreas=NationalArea::all();
        $provinceAreas=ProvinceArea::all();
        $data=['voter'=>$voter,'nationalAreas'=>$nationalAreas,'provinceAreas'=>$provinceAreas];
        return view('admin.Voters.Edit',$data);
    }
    public function update(Request $request,$id)
    {
        // $oldImage=$request->old_image;
        $voter=Voter::findOrFail($id);
        $user=User::findOrFail($voter->user_id);
        // return $user;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->cnic=$request->cnic;
        $user->address=$request->address;
        $user->contact=$request->contact;
        
        if ($imagefile = $request->file('image')) {
            if (File::exists(public_path('images/userImages/'.$user->image))) 
            {
                File::delete(public_path('images/userImages/'.$user->image));
            }
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/userImages', $name);
            $user->image = $name;
        }
        $user->update();
        //attach role
        $user->detachRoles($user->roles);
        $role=Role::find(4);
        $user->attachRole($role);
        
        // $voter=new Voter();
        $voter->national_area_id=$request->nationalArea;
        $voter->province_area_id=$request->provinceArea;
        // $user->voterareas()->update($voter);
        $voter->update();
        return redirect()->route('voters.index')->with('success', 'Voter Updated Successfully');

        // return redirect()->back();
        //  return $random;
    }
    public function delete($id)
    {
       $voter=Voter::findOrFail($id);
    //    $userId=$voter->user_id;
       $voter->delete();

    //    $user=User::findOrFail($userId);
    //    if (File::exists(public_path('images/userImages/'.$user->image))) 
    //         {
    //             File::delete(public_path('images/userImages/'.$user->image));
    //         }

    //     $user->delete();    
        return response()->json(['status'=>'Voter deleted Successfully']);


        // $user = User::findOrFail($id);
        // foreach($user->roles as $role)
        // {
        //     if($role->id==3)
        //     {
        //         $role = Role::where('name', 'voter')->first();
        //         $user->detachRole($role);
        //         return response()->json(['status'=>'Voter deleted Successfully']);
        //     }
        //     else
        //     {
        //        $image=$user->image;
        //        if (File::exists(public_path('images/voterImages/'.$image))) {
        //         File::delete(public_path('images/voterImages/'.$image));
        //         }
        
        //         $user->delete();
        //      return response()->json(['status'=>'Voter deleted Successfully']);

        //     }
        // }
       
    }
    public function show($id)
    {
        // $voter=User::findOrFail($id);
        $voter=Voter::findOrFail($id);
        // return $voter;
        // $voterArea=$voter->areas->pluck('name')->toArray();
        // $data= ['voter'=>$voter,'voterArea'=>$voterArea];
        $data= ['voter'=>$voter];
        return view('admin.Voters.View',$data);
        
    }
   
}

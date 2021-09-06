<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use Hash;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class ManageUsers extends Controller
{
    //
    public function index()
    {
        $users = User::whereHas('roles', function ($role) {
            $role->where('name', '=', 'admin')->orWhere('name','=','super-admin');
        })->get();
        $data= ['users'=>$users];
        return view('admin.Users.index', $data);
    }
    public function create()
    {
        $roles = Role::whereIn('id',[1,2])->get();
        $data['roles'] = $roles;
        return view('admin.Users.CreateUser', $data);
    }
    public function store(UserRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        if ($imagefile = $request->file('image')) {
           
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/userImages', $name);
            $user->image = $name;
        }
        $user->password = Hash::make($request->password);
        $user->save();
        $role = $request->role;
        $user->attachRole($role);
        return redirect()->route('users.index')->with('success', 'User is saved successfully');
       
    }
    public function edit($id)
    {
        $roles = Role::whereIn('id',[1,2])->get();
        $user = User::findOrFail($id);
        $rolesIds = $user->roles->pluck('id')->toArray();
        $data = ['user' => $user, 'roles' => $roles, 'rolesIds'=>$rolesIds];
        return view('admin.Users.EditUser', $data);
    }
    public function update(UpdateUserRequest $request,$id)
    {
        $password = $request->input('password', null);
        $request->request->remove('password');
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if ($imagefile = $request->file('image')) {
           
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/userImages', $name);
            $user->image = $name;
        }
        $user->detachRoles($user->roles);
        $roles = $request->role;
        $user->attachRole($roles);
        // for ($i = 0; $i < count($roles); $i++) {
        //     $role = Role::find($roles[$i]);
        //     $user->attachRole($role);
        // }
        if(!empty($password))
        {
            $user->password = Hash::make($password);
        }
        $user->save();
        Alert::success('Success','User Updated Successfully!'); 
        return redirect()->route('users.index');
    }
    public function delete($id)
    {
        
        $user = User::findOrFail($id);
        if(Auth()->user()->id==$user->id)
        {
            return response()->json(['status'=>1]);
        }
        else{
            if (File::exists(public_path('images/userImages/'.$user->image))) 
            {
                File::delete(public_path('images/userImages/'.$user->image));
            }
            $user->delete();
        return response()->json(['status'=>2]);
        }
      
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $data['user']=$user;
        return view('admin.Users.ViewUser',$data);
    }

}

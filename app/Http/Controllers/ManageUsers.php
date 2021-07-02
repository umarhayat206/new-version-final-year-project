<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use Hash;

class ManageUsers extends Controller
{
    //
    public function index()
    {

        //return $clients;
        // $users = User::paginate(5);
        $users = User::whereHas('roles', function ($role) {
            $role->where('name', '=', 'admin')->orWhere('name','=','super-admin');
        })->get();

        // $users = User::all();
        $data= ['users'=>$users];
        return view('admin.Users.index', $data);
    }
    public function create()
    {
        $roles = Role::all();
        $data['roles'] = $roles;
        return view('admin.Users.CreateUser', $data);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $roles = $request->role;
        for ($i = 0; $i < count($roles); $i++) {
            $role = Role::find($roles[$i]);
            $user->attachRole($role);
            //echo $role->id."<br>";
        }
        return redirect()->route('users.index')->with('success', 'User is saved successfully');
        //        before code
        //        $role = Role::where('id', $request->role)->first();
        //        $user = new User();
        //        $user->name = $request->name;
        //        $user->email = $request->email;
        //        $user->password = Hash::make($request->password);
        //$user->fill($request->all());
        //        $user->save();
        //        $user->attachRole($role);
        //
    }
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $rolesIds = $user->roles->pluck('id')->toArray();
        $data = ['user' => $user, 'roles' => $roles, 'rolesIds'=>$rolesIds];
        return view('admin.Users.EditUser', $data);
    }
    public function update(Request $request, $id)
    {
        $password = $request->input('password', null);
        $request->request->remove('password');
        $user = User::findOrFail($id);
        $user->detachRoles($user->roles);
        $roles = $request->role;
        for ($i = 0; $i < count($roles); $i++) {
            $role = Role::find($roles[$i]);
            $user->attachRole($role);
        }
        $user->fill($request->all());
        if(!empty($password))
        {
            $user->password = Hash::make($password);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'User is saved successfully');
    }
    public function delete($id)
    {
        // $currentUser = Auth::user();
        $user = User::findOrFail($id);
        // if ($currentUser->id != $user->id) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User is deleted successfully');
        // }
        // return back()->with('error','You cannot delete yourself');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $data['user']=$user;
        return view('admin.Users.ViewUser',$data);
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\User;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Validator;
use File;
 use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    //
    public function update(Request $request)
    {

        // Log::debug($request->all());
        // return ;
        $validator=Validator::make($request->all(),[

            'oldpassword'=>[
                'required',function($attribute,$value,$fail){
                    if(!Hash::check($value,Auth::user()->password))
                    {
                        return $fail(__('The current Password is Incorrect'));
                    }
                
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'

        ],[
            'oldpassword.required'=>'Enter Your Current Password',
            'newpassword.required'=>'Enter Your New Password',
            'cnewpassword.required'=>'ReEnter Your new password'
        ]);
        if(!$validator->passes())
        {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $update=User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);
            if(!$update)
            {
                return response()->json(['status'=>0,'msg'=>'Does not update password something went wrong in db']); 
            }
            else
            {
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']); 
            }
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class NotificationsController extends Controller
{
    //
    public function index()
    {
        $notifications=Notification::all();
        $data= ['notifications'=>$notifications];
        return view('admin.Notifications.index',$data);
    }
    public function create()
    {
        return view('admin.Notifications.create');
    }
    public function store(NotificationRequest $request)
    {
        $notification=new Notification();
        $notification->title=$request->title;
        $notification->image=$request->image;
        $notification->description=$request->description;
        if ($imagefile = $request->file('image')) {
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images', $name);
            $notification->image = $name;
        }
        $notification->save();
        return redirect()->route('notifications.index')->with('success', 'Notification Created Successfully');

        // Alert::success('Success','Notification Created Successfully!'); 
        // return redirect()->route('notifications.index');
    }
    public function edit($id)
    {
        $notification=Notification::findOrFail($id);
        $data=['notification'=>$notification];
        return view('admin.Notifications.edit',$data);
    }
    public function update(NotificationRequest $request,$id)
    {
        $notification=Notification::findOrFail($id);
        $notification->title=$request->title;
        $notification->description=$request->description;
        $notification->update();
        return redirect()->route('notifications.index')->with('success', 'Notification updated Successfully');

        // Alert::success('Success','Notification Updated Successfully!'); 
        // return redirect()->route('notifications.index');
    }
    public function delete($id)
    {
      
        $notification=Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['status'=>'Notification deleted Successfully']);
    }
    public function show($id)
    {
        $notification=Notification::findOrFail($id);
        $data=['notification'=>$notification];
        return view('admin.Notifications.view',$data);
    }
    public function publicNotification()
    {
        $notifications=Notification::all();
        $data= ['notifications'=>$notifications];
        return view('notifications',$data);
    }
    public function publicViewNotification($id)
    {
        $notification=Notification::findOrFail($id);
        $latestNotification=Notification::inRandomOrder()->limit(3)->get();
        $data= ['notification'=>$notification,'latestNotification'=>$latestNotification];
       return view('singleNotification',$data);
    }
   
}

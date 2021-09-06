<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
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
        $notification->description=$request->description;
        $notification->save();
        Alert::success('Success','Notification Created Successfully!'); 
        return redirect()->route('notifications.index');
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
        Alert::success('Success','Notification Updated Successfully!'); 
        return redirect()->route('notifications.index');
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
}

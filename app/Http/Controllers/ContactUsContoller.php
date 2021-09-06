<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactUsContoller extends Controller
{
    //
    public function index()
    {
        return view('contact_us');
    }
    public function submit(ContactUsRequest $request)
    {
        $details=[
            
            'email'=>$request->email,
            'name'=>$request->name,
            'subject'=>$request->subject,
            'message'=>$request->message,
           
          ];
        Mail::to('umar57339@gmail.com')->send(new ContactUsMail($details));

        return back()->with('success','Your message is deliverd');
    }
}

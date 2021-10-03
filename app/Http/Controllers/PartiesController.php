<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use File;

class PartiesController extends Controller
{
    //
    public function index()
    {
        
        $parties=Party::orderBy('id','asc')->get();
         $data= ['parties'=>$parties];
        return view('admin.Parties.index',$data);
        
    }
    public function create()
    {
        return view('admin.parties.CreateParty');
    }
    public function store(Request $request)
    {
        $party=new Party();
        $party->fill($request->all());
        if ($imagefile = $request->file('image')) {
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images', $name);
            $party->image = $name;
        }
        $party->save();
        return redirect()->route('parties.index')->with('success', 'Party Created Successfully');

    }
    public function edit($id)
    {
        $party=Party::findOrFail($id);
        $data=['party'=>$party];
        return view('admin.parties.EditParty',$data);

    }
    public function update(Request $request,$id)
    {
        $party=Party::findOrFail($id);
        $party->name=$request->name;
        if ($imagefile = $request->file('image')) {
            if (File::exists(public_path('images/partiesImages/'.$party->image))) 
            {
                File::delete(public_path('images/partiesImages/'.$party->image));
            }
            $name = time() . $imagefile->getClientOriginalName();
            $imagefile->move('images/partiesImages', $name);
            $party->image = $name;
        }
       
        $party->moto=$request->moto;
        $party->update();
        // return redirect()->route('parties.index');
        return redirect()->route('parties.index')->with('success', 'Party Updated Successfully');


    }
    public function delete($id)
    {
       $party=Party::findOrFail($id);
        $party->delete();    
        return response()->json(['status'=>'Party deleted Successfully']);
       
    }
}

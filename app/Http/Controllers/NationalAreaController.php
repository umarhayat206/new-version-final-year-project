<?php

namespace App\Http\Controllers;

use App\Http\Requests\NationalAreaRequest;
use App\Models\NationalArea;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NationalAreaController extends Controller
{
    //
    public function index()
    {
       $nationalareas=NationalArea::all();
        $data= ['nationalareas'=>$nationalareas];
        return view('admin.NationalAreas.index',$data);
    }
    public function create()
    {
        return view('admin.NationalAreas.create');
    }
    public function store(NationalAreaRequest $request)
    {
        $newArea=new NationalArea();
        $newArea->name=$request->name;
        $newArea->notes=$request->notes;
        $newArea->save();
        Alert::success('Success','Area  Created Successfully!'); 
        return redirect()->route('nationalareas.index');
    }
    public function edit($id)
    {
        $area=NationalArea::findOrFail($id);
        $data=['area'=>$area];
        return view('admin.NationalAreas.edit',$data);
    }
    public function update(NationalAreaRequest $request,$id)
    {
        $area=NationalArea::findOrFail($id);
        $area->name=$request->name;
        $area->notes=$request->notes;
        $area->update();
        Alert::success('Success','Area  updated Successfully!'); 
        return redirect()->back();
       
    }
    public function delete($id)
    {
        $area=NationalArea::findOrFail($id);
        $area->delete();
        return response()->json(['status'=>'Area deleted Successfully']);
    }
}

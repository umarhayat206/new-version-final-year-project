<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceAreaRequest;
use App\Models\ProvinceArea;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinceAreaController extends Controller
{
    //
    public function index()
    {
       $provinceAreas=ProvinceArea::all();
        $data= ['provinceAreas'=>$provinceAreas];
        return view('admin.ProvinceAreas.index',$data);
    }
    public function create()
    {
        return view('admin.ProvinceAreas.create');
    }
    public function store(ProvinceAreaRequest $request)
    {
        $newArea=new ProvinceArea();
        $newArea->name=$request->name;
        $newArea->notes=$request->notes;
        $newArea->save();
        return redirect()->route('provinceareas.index')->with('success', 'Area Created Successfully');

        // Alert::success('Success','Area  Created Successfully!'); 
        // return redirect()->route('provinceareas.index');
    }
    public function edit($id)
    {
        $area=ProvinceArea::findOrFail($id);
        $data=['area'=>$area];
        return view('admin.ProvinceAreas.edit',$data);
    }
    public function update(ProvinceAreaRequest $request,$id)
    {
        $area=ProvinceArea::findOrFail($id);
        $area->name=$request->name;
        $area->notes=$request->notes;
        $area->update();
        return redirect()->route('provinceareas.index')->with('success', 'Area updated Successfully');

        // Alert::success('Success','Area  updated Successfully!'); 
        // return redirect()->back();
       
    }
    public function delete($id)
    {
        $area=ProvinceArea::findOrFail($id);
        $area->delete();
        return response()->json(['status'=>'Area deleted Successfully']);
    }
}

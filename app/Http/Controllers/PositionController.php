<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PositionController extends Controller
{
    //

    public function index()
    {
        $positions=Position::all();
        $data= ['positions'=>$positions];
        return view('admin.Positions.index',$data);
    }
    public function create()
    {
        return view('admin.Positions.create');
    }
    public function store(PositionRequest $request)
    {
        $position=new Position();
        $position->title=$request->title;
        $position->notes=$request->notes;
        $position->save();
        return redirect()->route('positions.index')->with('success', 'Position Created Successfully');

        // Alert::success('Success','Position Created Successfully!'); 
        // return redirect()->route('positions.index');
    }
    public function edit($id)
    {
        $position=Position::findOrFail($id);
        $data=['position'=>$position];
        return view('admin.Positions.edit',$data);
    }
    public function update(PositionRequest $request,$id)
    {
        $position=Position::findOrFail($id);
        $position->title=$request->title;
        $position->notes=$request->notes;
        $position->update();
        return redirect()->route('positions.index')->with('success', 'Position Updated Successfully');

        // Alert::success('Success','Position Updated Successfully!'); 
        // return redirect()->route('positions.index');
    }
    public function delete($id)
    {
        $position=Position::findOrFail($id);
        $position->delete();
        return response()->json(['status'=>'Position deleted Successfully']);
    }

}

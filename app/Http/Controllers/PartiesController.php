<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use RealRashid\SweetAlert\Facades\Alert;

class PartiesController extends Controller
{
    //
    public function index()
    {
        Alert::success('Party Registerd successfully', 'You are successfull');
        $parties=Party::orderBy('id','asc')->get();
        $data= ['parties'=>$parties];
        // Alert::success('İşlem Başarılı!', 'Slider resmi ekleme işleminiz başarılı.');
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
        return redirect()->route('parties.index');
    }
}

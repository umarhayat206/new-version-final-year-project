<?php

namespace App\Http\Controllers;

use App\Models\NationalArea;
use App\Models\ProvinceArea;
use App\Models\Candidate;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index()
    {
        $nationalAreas=NationalArea::all();
        $provinceAreas=ProvinceArea::all();
        $data=['nationalAreas'=>$nationalAreas,'provinceAreas'=>$provinceAreas];
        return view('Results',$data);
    }
    public function nationalView($id)
    {
         $nationalArea = NationalArea::findOrFail($id);
         $nationalAreaName = $nationalArea->name;
         $nationalcandidates = Candidate::whereHas('nationals', function ($query) use ($nationalAreaName) {
             $query->where('name', '=', $nationalAreaName);
         })->get();
         $data= ['nationalcandidates'=>$nationalcandidates,'id'=>$id];
         return view('NationalAssembleyResults',$data);
    }
    public function provinceView($id)
    {
        $provinceArea = ProvinceArea::findOrFail($id);
        $provinceAreaName = $provinceArea->name;
        $provincecandidates = Candidate::whereHas('provinces', function ($query) use ($provinceAreaName) {
            $query->where('name', '=', $provinceAreaName);
        })->get();
        $data= ['provincecandidates'=>$provincecandidates,'id'=>$id];
        return view('ProvinceAssembleyResults',$data);
    }
}

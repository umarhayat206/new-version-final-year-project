<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Voter;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
     {  
         
        $voters=Voter::count();
        $candidates=Candidate::count();
        $parties =Party::count();
        $date_start="2021-09-05 16:58:30";
        $date_end="2021-09-05 19:00:00";
        $start_date=Carbon::parse($date_start)->format('F j, Y H:i:s');
        $end_date=Carbon::parse($date_end)->format('F j, Y H:i:s');
        // dd(Carbon::now(),$date);
        $data= ['voters'=>$voters,'candidates'=>$candidates,'parties'=>$parties,'start_date'=>$start_date,'end_date'=>$end_date];
        return view('admin.Dashboard',$data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidatePosition;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Voter;
use App\Models\Voting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $arrayClass = array();
        $parties12=Party::all();
        foreach($parties12 as $party)
        { 
            
            $votecount=Voting::where('national_party',$party->id)->count();
            
            $arrayClass[] = [
                'name'=>$party->name,
                'votecount'=>$votecount,

             ];
        }
        foreach($parties12 as $party)
        { 
            
            $votecount=Voting::where('province_party',$party->id)->count();
            
            $arrayClass2[] = [
                'name'=>$party->name,
                'votecount'=>$votecount,

             ];
        }
        
        $mnas=CandidatePosition::where('position_id',1)->count();
        $mpas=CandidatePosition::where('position_id',2)->count();
        $data= ['voters'=>$voters,'candidates'=>$candidates,'parties'=>$parties,'start_date'=>$start_date,'end_date'=>$end_date,'arrayClass'=>$arrayClass,
        'arrayClass2'=>$arrayClass2,'mnas'=>$mnas,'mpas'=>$mpas];
        return view('admin.Dashboard',$data);
    }
    public function chartData(Request $request)
    {
        $area=$request->area;
        $users = DB::table('parties')
         ->select("parties.name", DB::raw("count(nationl_results.party_id) as VoteCount"))
         ->join('nationl_results', 'parties.id', '=', 'nationl_results.party_id' )
         ->where('nationl_results.area_id',$area)
         ->groupBy('parties.name')
         ->get();
         foreach($users->toArray() as $row)
         {
              $output[]=array(
                 'name'=>$row->name,
                 'count'=>$row->VoteCount
              );
         }
         return response()->json($output);
        //  return $users;
    }
    public function chartDataProvince(Request $request)
    { 
        
        $area=$request->area;
        $users = DB::table('parties')
         ->select("parties.name", DB::raw("count(province_results.party_id) as VoteCount"))
         ->join('province_results', 'parties.id', '=', 'province_results.party_id' )
         ->where('province_results.area_id',$area)
         ->groupBy('parties.name')
         ->get();
         foreach($users->toArray() as $row)
         {
              $output[]=array(
                 'name'=>$row->name,
                 'count'=>$row->VoteCount
              );
         }
         return response()->json($output);
        //  return $users;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\NationalArea;
use App\Models\ProvinceArea;
use App\Models\Voter;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class CastVoteController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
      
    }
   
    public function index()
    {
        $currentUser = Auth()->User()->id;
        $voter = Voter::where('user_id', '=', $currentUser)->first();
        $inVoting=Voting::where('voter_id',$voter->id)->first();
         
        if(!empty($inVoting))
        {
            // Alert::warning('Warning','You have already cast the vote!'); 
    //    return redirect()->route('home');
        return response()->json(['status'=>'0','msg'=>'You have already casted the vote']);
        }
        else{
            $nationalArea = NationalArea::findOrFail($voter->national_area_id);
            $nationalAreaName = $nationalArea->name;
            $provinceArea = ProvinceArea::findOrFail($voter->province_area_id);
            $provinceAreaName = $provinceArea->name;
    
            $nationalcandidates = Candidate::whereHas('nationals', function ($query) use ($nationalAreaName) {
                $query->where('name', '=', $nationalAreaName);
            })->get();
            $provincecandidates = Candidate::whereHas('provinces', function ($query) use ($provinceAreaName) {
                $query->where('name', '=', $provinceAreaName);
            })->get();
            $data= ['nationalcandidates'=>$nationalcandidates,'provincecandidates'=>$provincecandidates];
            return view('CastVote',$data);

        }
       
    }
    public function store(Request $request)
    {
        $messages = [
            'nationalcandidate.required' => 'Please! Select National Assembley Candidate',
            'provincecandidate.required' => 'Please! Select Province Assembley Candidate'
            ];

        $validator = Validator::make($request->all(), [
            'nationalcandidate' => 'required',
            'provincecandidate' => 'required',
        ],$messages);
       
        if ($validator->passes()) {
            Log::debug('national candidate'.$request->nationalcandidate.'province candidate'.$request->provincecandidate);
            $userId=Auth()->user()->id;
            $voter=Voter::where('user_id',$userId)->first();
            Log::debug('Voter is'.$voter);
            $voting=new Voting();
            $voting->voter_id=$voter->id;
            $voting->national_candidate_id=$request->nationalcandidate;
            $nCandidate=Candidate::where('id',$request->nationalcandidate)->first();
            $nParty=$nCandidate->party->id;
            $voting->national_party=$nParty;
            $voting->province_candidate_id=$request->provincecandidate;
            $pCandidate=Candidate::where('id',$request->provincecandidate)->first();
            $pParty=$pCandidate->party->id;
            $voting->province_party=$pParty;
            $voting->save();   
            return response()->json(['success'=>'Your Vote is casted Successfully','url'=>url('/home')]);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}

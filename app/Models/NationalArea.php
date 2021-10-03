<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalArea extends Model
{
    use HasFactory;
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_national_area')->withPivot('vote_count');;
    }
}

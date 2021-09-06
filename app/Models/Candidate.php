<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'candidate_position');
    }
    public function provinces()
    {
        return $this->belongsToMany(ProvinceArea::class, 'candidate_province_area');
    }
    public function nationals()
    {
        return $this->belongsToMany(NationalArea::class, 'candidate_national_area');
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
   
}

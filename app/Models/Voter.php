<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nationalArea()
    {
        return $this->belongsTo(NationalArea::class);
    }
     
    public function provinceArea()
    {
        return $this->belongsTo(ProvinceArea::class);
    }
}

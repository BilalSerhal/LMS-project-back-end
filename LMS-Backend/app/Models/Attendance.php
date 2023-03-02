<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'date'
        ];

    public function Student(){
        return $this->belongsTo(UserLMS::class);
    }
    public function levelSection(){
        return $this->belongsTo(LevelSection::class);
    }

}

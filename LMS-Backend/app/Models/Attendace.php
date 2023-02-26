<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    protected $fillable = [
        'levelSectionId',
        'studentId',
        'status',
        'date',

    ];

    use HasFactory;

    public function Student(){
        return $this->belongsTo(UserLMS::class);
    }
}

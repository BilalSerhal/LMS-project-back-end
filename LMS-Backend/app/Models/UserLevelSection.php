<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevelSection extends Model
{
    use HasFactory;

    public function levelSection(){
        return $this->belongsToMany(LevelSection::class);
    }

    public function course(){
        return $this->belongsToMany(Course::class);
    }

    public function Student(){
        return $this->belongsToMany(UserLMS::class);
    }

    public function Teacher(){
        return $this->belongsToMany(UserLMS::class);
    }
}

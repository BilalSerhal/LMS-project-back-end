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

    public function users(){
        return $this->belongs(UserLMS::class,'user_level_sections_id');
    }

   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSection extends Model
{
    use HasFactory;
    public function Level(){
        return $this->belongsToMany(Level::class);
    }

    public function Section(){
        return $this->belongsToMany(Section::class);
    }
}

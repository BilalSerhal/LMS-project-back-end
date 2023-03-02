<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class UserLevelSection extends Pivot
{
    use EagerLoadPivotTrait;

    protected $table = 'user_level_sections';

    public function levelSection(){
        return $this->belongsTo(LevelSection::class,);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function users(){
<<<<<<< HEAD
        return $this->belongs(UserLMS::class,'user_level_sections_id');
=======
        return $this->belongsTo(UserLMS::class, 'user_level_sections_id');
>>>>>>> origin/dev
    }
  

<<<<<<< HEAD
   
=======
    
>>>>>>> origin/dev
}

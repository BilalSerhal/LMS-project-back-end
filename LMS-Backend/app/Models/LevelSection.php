<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LevelSection extends Pivot
{   
    
    use EagerLoadPivotTrait;

    protected $table = 'level_sections';

    protected $fillable = [
        'capacity',
        ];


    //you only but attendance and userlevelsection relation here
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'level_sections_id');
    }
    public function userLevelSection()
    {
        return $this->hasMany(UserLevelSection::class, 'level_sections_id');
    }

}

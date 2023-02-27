<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LevelSection extends Pivot
{   
    
    use EagerLoadPivotTrait;

    protected $fillable = [
        'capacity',
        ];

    //you only but attendance and userlevelsection relation here
    
}

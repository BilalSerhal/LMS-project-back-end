<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class Section extends Model
{
  use EagerLoadPivotTrait;

    protected $fillable = [
        'sectionName',
        
    ];
    public function levels()
    {
      return $this->belongsToMany(Level::class, 'level_sections', 'level_id', 'section_id');
     
    }

   
}

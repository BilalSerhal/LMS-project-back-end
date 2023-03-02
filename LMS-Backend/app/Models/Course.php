<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
<<<<<<< HEAD
    use HasFactory;
    protected $fillable = [
        'subject',
        ];
=======
    use HasFactory,SoftDeletes;
   
>>>>>>> origin/dev

    protected $fillable = [
        'subject',
    ];

    public function UserLevelSection(){
        return $this->hasMany(UserLevelSection::class);
    }
}



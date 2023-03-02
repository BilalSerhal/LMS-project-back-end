<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class UserLMS extends Model
{
    use EagerLoadPivotTrait;

    protected $table = 'user_l_m_s';


    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'role',
        'phoneNumber',
    ];

    public function Attendance(){
        return $this->hasOne(Attendace::class);
    }

    public function levelSections()
    {
        return $this->hasMany(UserLevelSection::class,'levelSection_id');
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class, 'user_level_section', 'user_id', 'level_section_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'user_level_section', 'user_id', 'level_section_id');
    }
}

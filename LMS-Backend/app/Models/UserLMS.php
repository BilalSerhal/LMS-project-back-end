<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserLMS extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function Student(){
        return $this->hasOne(UserLevelSection::class);
    }

    public function Teacher(){
        return $this->hasOne(UserLevelSection::class);
    }


}

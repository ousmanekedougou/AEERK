<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Speciality;
class Domaine extends Model
{
    protected $fllable = ['name','slug'];

    public function specialities(){
        return $this->hasMany(Speciality::class);
    }
}

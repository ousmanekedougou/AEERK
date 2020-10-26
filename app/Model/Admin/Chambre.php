<?php

namespace App\Model\Admin;

use App\Model\Admin\Ancien;
use App\Model\Admin\Nouveau;
use App\Model\Admin\Immeuble;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    public function immeubles(){
        return $this->belongsToMany(Immeuble::class,'immeuble_chambres');
    }


    public function nouveaus(){
        return $this->hasMany(Nouveau::class);
    }

    public function anciens(){
        return $this->hasMany(Ancien::class);
    }
}

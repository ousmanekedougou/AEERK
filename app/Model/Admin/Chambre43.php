<?php

namespace App\Model\Admin;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use Illuminate\Database\Eloquent\Model;

class Chambre43 extends Model
{
    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }

    public function recasements(){
        return $this->hasMany(Recasement::class);
    }

    public function anciens(){
        return $this->hasMany(Ancien::class);
    }

    public function nouveaus(){
        return $this->hasMany(Nouveau::class);
    }
}

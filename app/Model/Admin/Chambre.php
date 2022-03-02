<?php

namespace App\Model\Admin;


use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\User\Etudiant;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement;
use App\Model\User\Recasement_ancien;
use App\Model\User\Recasement_nouveau;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
     protected $fillable = [
        'nom', 'nombre','genre','status','is_pleine','position'
    ];
    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
        // return $this->belongsToMany(Immeuble::class,'immeuble_chambres');
    }

    public function recasement_nouveaus(){
        return $this->hasMany(Recasement_ancien::class);
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

    public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
}

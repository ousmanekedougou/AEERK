<?php

namespace App\Model\Admin;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\Admin\Chambre;
use App\Model\User\Recasement;
use App\Model\User\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    public function chambres(){
        return $this->hasMany(Chambre::class);
        // return $this->belongsToMany(Chambre::class,'immeuble_chambres');
    }

    protected $fillable = [
        'name', 'address','status' 
    ];
    
    public function recasements(){
        return $this->hasMany(Recasement::class);
    }

    public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
}

<?php

namespace App\Model\Admin;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\Admin\Chambre;
use App\Model\User\Recasement;
use App\Model\User\Recasement_ancien;
use App\Model\User\Recasement_nouveau;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    public function chambres(){
        return $this->belongsToMany(Chambre::class,'immeuble_chambres');
    }
    protected $fillable = [
        'name', 'address','status' 
    ];
    public function anciens(){
        $this->hasMany(Ancien::class);
    }
    public function nouveaus(){
        $this->hasMany(Nouveau::class);
    }

    public function recasements(){
        return $this->hasMany(Recasement::class);
    }
}

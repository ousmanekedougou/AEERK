<?php

namespace App\Model\Admin;

use App\User\Ancien;
use App\User\Nouveau;
use App\Model\Admin\Chambre;
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
}

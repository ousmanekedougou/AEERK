<?php

namespace App\Model\User;
use App\Model\User\Speciality;
use App\Model\User\Niveau;
use App\Model\User\Commune;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'genre',
        'name',
        'email',
        'phone',
        'slug',
        'profile',
        'niveau_id',
        'speciality_id',
        'commune_id',
        'image',
        'cni',
        'cv',
        'status',
        'token_number',
        'code'
        ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    
    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function commune(){
        return $this->belongsTo(Commune::class);
    }
}

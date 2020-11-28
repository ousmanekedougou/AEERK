<?php

namespace App\Model\Admin;

use App\Model\User\Ancien;
use App\Model\User\Nouveau;
use App\Model\Admin\Departement;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'name','departement_id'
    ];
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function anciens()
    {
        return $this->hasMany(Ancien::class);
    }

    public function nouveaus()
    {
        return $this->hasMany(Nouveau::class);
    }
}

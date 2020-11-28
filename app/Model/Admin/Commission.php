<?php

namespace App\Model\Admin;

use App\Model\Admin\Poste;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    public function postes(){
        return $this->belongsToMany(Poste::class,'commission_postes');
    }
}

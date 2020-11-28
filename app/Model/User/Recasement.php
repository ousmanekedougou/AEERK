<?php

namespace App\Model\User;

use App\Model\Admin\Chambre;
use App\Model\Admin\Immeuble;
use Illuminate\Database\Eloquent\Model;

class Recasement extends Model
{
    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }

    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }
}

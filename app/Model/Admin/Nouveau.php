<?php

namespace App\Model\Admin;

use App\Model\Admin\Chambre;
use App\Model\Admin\Commune;
use App\Model\Admin\Immeuble;
use Illuminate\Database\Eloquent\Model;

class Nouveau extends Model
{
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }

    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }
}

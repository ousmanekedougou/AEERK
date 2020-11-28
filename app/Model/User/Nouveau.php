<?php

namespace App\Model\User;

use App\Model\Admin\Chambre;
use App\Model\Admin\Commune;
use App\Model\Admin\Immeuble;
use App\Model\User\Recasement_nouveau;
use Illuminate\Database\Eloquent\Model;
use App\Model\User\Codification_nouveau;

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

    public function codification_nouveau(){
        return $this->belongsTo(Codification_nouveau::class);
    }
    public function recasement_nouveau(){
        return $this->belongsTo(Recasement_nouveau::class);
    }
}

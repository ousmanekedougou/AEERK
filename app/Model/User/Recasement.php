<?php

namespace App\Model\User;

use App\Model\Admin\Chambre;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Chambre39;
use App\Model\Admin\Chambre43;
use App\Model\Admin\Chambrezone;
use Illuminate\Database\Eloquent\Model;

class Recasement extends Model
{
    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }
    public function chambre39(){
        return $this->belongsTo(Chambre39::class);
    }
    public function chambre43(){
        return $this->belongsTo(Chambre43::class);
    }
    public function chambrezone(){
        return $this->belongsTo(Chambrezone::class);
    }

    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }
}

<?php

namespace App\Model\User;
use App\Model\Admin\Chambre;
use App\Model\Admin\Commune;
use App\Model\Admin\Faculty;
use App\Model\Admin\Immeuble;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
     use  Notifiable;

     protected $fillable = [
        'subject', 'message',
    ];
        public function commune(){
        return $this->belongsTo(Commune::class);
    }

    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }

    public function chambre(){
        return $this->belongsTo(Chambre::class);
    }

    public function facultie(){
        return $this->belongsTo(Faculty::class);
    }
}

<?php

namespace App\Model\User;

use App\Model\Admin\Commune;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
  protected $fillable = [
      'genre', 'name', 'email', 'phone', 'password', 'naissance', 'lieu' , 'niveau',
      'diplome' , 'curiculum' , 'image' , 'identite' , 'commune_id' , 'etablissement' , 'status' , 'filliere'
    ];
      public function commune(){
        return $this->belongsTo(Commune::class);
    }
}

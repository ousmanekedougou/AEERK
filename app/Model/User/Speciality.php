<?php

namespace App\Model\User;
use App\Model\User\Domaine;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
   protected $fillable = ['name','slug','domaine_id'];

   public function domaine(){
       return $this->belongsTo(Domaine::class);
   }
}

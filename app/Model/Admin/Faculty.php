<?php

namespace App\Model\Admin;

use App\Model\User\Document;
use App\Model\User\Etudiant;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name','slug','faculty_id','for'
    ];

    public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
}

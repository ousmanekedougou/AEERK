<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'titre', 'lien', 'lien_name', 'status' ,'desc' , 'content' , 'type'
    ];
}

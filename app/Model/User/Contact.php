<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['nom','email','subject','message'];
}

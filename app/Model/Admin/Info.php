<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
         'email', 'phone','adresse','bp','fax'
    ];
}

<?php

namespace App\Model\Admin;

use App\Model\Admin\Poste;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}

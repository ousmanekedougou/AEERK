<?php

namespace App\Model\Admin;

use App\Model\Admin\Commune;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'name',
    ];

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}

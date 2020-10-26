<?php

namespace App\Model\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Commission;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    public function commissions(){
        return $this->belongsToMany(Commission::class,'commission_postes');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class,'admin_postes');
    }
}

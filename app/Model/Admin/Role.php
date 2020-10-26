<?php

namespace App\Model\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permissions');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class,'role_admins');
    }

   
}

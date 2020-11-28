<?php

namespace App\Model\Admin;

use App\Model\Admin\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_permissions');
    }
}

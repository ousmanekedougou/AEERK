<?php

namespace App\Model\Admin;

use App\Model\Admin\Poste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','phone','image','status','poste_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_admins');
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
}

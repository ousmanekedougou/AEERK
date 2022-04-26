<?php

namespace App\User;

use App\Model\User\Type;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function type(){
        return $this->belongsTo((Type::class));
    }
}

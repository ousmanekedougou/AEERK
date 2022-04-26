<?php

namespace App\Model\User;

use App\User\Document;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function documents(){
        return $this->hasMany(Document::class);
    }
}

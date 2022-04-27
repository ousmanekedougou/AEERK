<?php

namespace App\Model\User;

use App\Model\User\Document;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];
    public function documents(){
        return $this->hasMany(Document::class);
    }
}

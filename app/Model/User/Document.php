<?php

namespace App\Model\User;

use App\Model\User\Type;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title','auteur','subject','status','resume','pub_at','slug','desc','image','file','type_id'];
    public function type(){
        return $this->belongsTo((Type::class));
    }
}

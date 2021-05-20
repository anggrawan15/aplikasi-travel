<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    //
    protected $guarded = [];

    public function restoItem(){
        return $this->hasMany(RestoItem::class);
    }
    
}

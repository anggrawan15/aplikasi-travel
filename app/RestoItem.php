<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoItem extends Model
{
    //

    protected $guarded = [];

    public function resto(){
        return $this->belongsTo(Resto::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }

}

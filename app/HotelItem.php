<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelItem extends Model
{
    //
    protected $guarded = [];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $guarded = [];

    
    public function hotelItem(){
        return $this->hasMany(HotelItem::class);
    }


}

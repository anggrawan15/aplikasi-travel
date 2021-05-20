<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{

    protected $guarded = [];
    //agar data dapat di gunakan pada Class Wisata Item
    public function wisataItem(){
        return $this->hasMany(WisataItem::class);
    }

    public function hotelItem(){
        return $this->hasMany(HotelItem::class);
    }

    public function restoItem(){
        return $this->hasMany(RestoItem::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

}

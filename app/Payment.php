<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded = [];

    //menggunakan data Order
    public function order(){
        return $this->belongsTo(Order::class);
    }
}

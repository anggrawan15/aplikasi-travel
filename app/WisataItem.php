<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WisataItem extends Model
{
    //
    protected $guarded = [];

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }
}

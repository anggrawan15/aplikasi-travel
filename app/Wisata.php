<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    

    protected $guarded = [];

    //Agar data dapat di gunakan pada class Wisata Item
    public function wisataItem(){
        return $this->hasMany(WisataItem::class);
    }

    
}

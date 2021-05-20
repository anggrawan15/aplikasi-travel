<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    protected $appends = ['status_order'];

    //ini Accessor
    //dimulai dengan key -get- dan di adkhiri dengan -Attribute-
    public function getStatusOrderAttribute(){

        if($this->status == 0) {
            return '<span class="badge badge-secondary">Memesan</span>';
        }elseif ($this->status == 1) {
            return '<span class="badge badge-info">Menunggu</span>';
        }elseif ($this->status == 2) {
            return '<span class="badge badge-warning">Menunggu Pembayaran</span>';
        }elseif ($this->status == 3) {
            return '<span class="badge badge-danger">Dibatalkan</span>';
        }elseif ($this->status == 4) {
            return '<span class="badge badge-primary">Telah Di Bayar</span>';
        }else{
            return '<span class="badge badge-success">Selesai</span>';
        }
        
        
    }

    //menerima data dati paket
    public function paket(){
        return $this->belongsTo(Paket::class);
    }

    //menerima data dari customer
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    //menggirim data ke payment
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}

<?php

namespace App\Models;

class Product extends Model{
    protected $table = 'Product';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    function seller(){
        return $this->belongsTo(User::class, 'id_user');
    }

    function getHargaAttribute(){
        return "Rp. ".number_format($this->attributes['harga']);
    }


}

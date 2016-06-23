<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table='productDetails';
    public $timestamps=false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public  function product()
    {
        return $this->belongsTo('App\Product','idProduct');
    }
}

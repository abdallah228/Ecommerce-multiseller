<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    //
    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany('App\Product', 'order_items','order_id','product_id')->withPivot('price','quantity');
    }
}

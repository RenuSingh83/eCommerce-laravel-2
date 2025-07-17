<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
    //
     use SoftDeletes;
    protected $table='cart';

     protected $fillable = ['user_id', 'product_id'];



     public function cartProductDetail()
     {

    return $this->belongsTo(Product::class,'product_id','id');

     }
      public function cartUser()
     {

    return $this->belongsTo(User::class,'user_id','id');

     }
}

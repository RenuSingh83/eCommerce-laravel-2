<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    protected $table='cart';

     protected $fillable = ['user_id', 'product_id'];
}

<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Add this
class Product extends Model
{
    use HasFactory,Notifiable;
    //
    protected $table='products';
}

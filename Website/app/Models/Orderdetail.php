<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","cart_id", "name", "email","phone","address", "postalcode", "orderstatus", "file", "payment", "price"];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productdetail extends Model
{
    protected $table = 'productdetails';
    use HasFactory;
    protected $fillable = ["product_id", "size","stock"];

}

<?php /** @noinspection ALL */


namespace App\Models;

use \Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'product_name', 'price', 'quantity', 'discount'
    ];


    protected $hidden = [];
}

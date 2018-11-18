<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $table = "products";

    protected $fillable = [
        'name',
        'url',
        'vendor',
        'title',
        'bean',
        'originalprice',
        'discountedprice',
        'description',
        'gram',
        'imageurl',
        'category',
    ];
}

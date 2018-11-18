<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
    	'mobile_user_id',
    	'product_id',
    	'product_price',
    	'mobile_user_new_balance',
    	'user_new_credit'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileUsers extends Model
{
    protected $table = "mobile_users";

    protected $fillable = [
        'name',
        'contact',
        'email',
        'password',
    ];
}

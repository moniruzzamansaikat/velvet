<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $casts = [
        'config' => 'object'
    ];

    protected $fillable = ['name', 'key', 'config', 'image'];
}

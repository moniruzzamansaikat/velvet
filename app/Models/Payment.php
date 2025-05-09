<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'amount',
        'currency',
        'method',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status == 'pending') {
            return '<span class="badge text-bg-dark">' . __('Pending') . '</span>';
        }

        if ($this->status == 'success') {
            return '<span class="badge text-bg-success">' . __('Success') . '</span>';
        }


        if ($this->status == 'failed') {
            return '<span class="badge text-bg-danger">' . __('Failed') . '</span>';
        }

        if ($this->status == 'refunded') {
            return '<span class="badge text-bg-warning">' . __('Refunded') . '</span>';
        }
    }

    public function paymentGateway()
    {
        return $this->belongsTo(PaymentGateway::class);
    }
}

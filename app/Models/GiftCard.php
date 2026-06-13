<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $fillable = [
        'recipient_name',
        'amount',
        'design',
        'message',
        'code',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentReceipt extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'searial_number',
        'payment_date',
        'narration',
        'bank_id',
        'party_id',
        'amount',
        'status',
    ];


}

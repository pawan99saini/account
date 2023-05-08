<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'proforma_id',
        'billing_id',
        'expense',
        'party_id',
        'invoice_date',
        'from',
        'to',
        'subtotal',
        'gst',
        'total',
        'remarks',
        'status',
        'invoice_number'
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class,'billing_id','id');
    }
    
    public function party()
    {
        return $this->belongsTo(Party::class,'party_id','id');
    }

    public function items(){
        return $this->hasMany(InvoiceDetail::class);
    }

    public function pi()
    {
        return $this->belongsTo(Party::class,'party_id','id');
    }
}

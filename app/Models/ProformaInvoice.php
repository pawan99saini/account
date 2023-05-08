<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProformaInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'billing_id',
        'party_id',
        'invoice_date',
        'subtotal',
        'gst',
        'total',
        'total_cgst',
        'total_sgst',
        'remarks',
        'status',
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
        return $this->hasMany(ProformaInvoiceDetail::class,'invoice_id','id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProformaInvoiceDetail extends Model
{
    use HasFactory;
    

    use SoftDeletes;

    protected $fillable = [
        'job_id',
        'invoice_id',
        'category_id',
        'service_id',
        'from',
        'to',
        'rate',
        'gst',
        'sac',
        'remarks',
        'status',  
        'type',
        'job_exe_id',

    ];

    public function invoice()
    {
        return $this->belongsTo(ProformaInvoice::class,'invoice_id','id');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InvoiceDetail extends Model
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
        'job_exe_id',
        'remarks',
        'type',
        'status',  
        'Internal_job',  
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
    
    public function cat()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }
}

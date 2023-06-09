<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'narration',
        'sac_code',
        'gst',
        'rate',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

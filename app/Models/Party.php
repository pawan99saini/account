<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'group_id',
        'cell_phone',
        'client_gst_number',
        'email',
        'pan',
        'partner_id',
        'address',
        'address_1',
        'country_id',
        'state_id',
        'city_id',
        'pincode',
        'status',
    ];

    public function party_country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    
    public function party_state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    
    public function party_city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}

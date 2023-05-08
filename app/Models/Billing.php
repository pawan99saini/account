<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Billing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_name',
        'address_1',
        'address_2',
        'country_id',
        'state_id',
        'city_id',
        'pincode',
        'phone',
        'email',
        'website',
        'gstin',
        'pan',
        'logo',
        'bank_details',
        'note',
        'preffix',
        'status',
        'pi_notes'
    ];


    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    
    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
    
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}

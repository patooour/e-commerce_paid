<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shippingGovernorate extends Model
{
    protected $table = 'shipping_governorates';

    protected $fillable = [
        'governorate_id',
        'price'
    ];
    public $timestamps = true;

    public function shippings(){
        return $this->hasMany('');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    protected $fillable = [
        'code',
        'discount',
        'discount_percentage',
        'start_at',
        'end_at',
        'limit',
        'time_used',
        'is_active',
        'note',

    ];
    public $timestamps = true;

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d h:i A', strtotime($value));
    }
    public function scopeValid($query)
    {
        return $query->where(  'is_active', 1 )
            ->where( 'time_used' ,'<' ,'limit' )
            ->where(  'end_at' ,'>' ,now()  );
    }
    public function scopeNotValid($query)
    {
        return $query->where(  'is_active',0   )
            ->orwhere(  'time_used' ,'>=' ,'limit')
            ->orwhere(  'end_at' ,'<' ,now() );
    }
    public function couponIsValid($query)
    {
        return $this->is_active = 1 &&
            $this->time_used < $this->limit &&
            $this->end_at > now();
    }
}

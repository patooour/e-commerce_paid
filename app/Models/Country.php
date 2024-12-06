<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    public $timestamps = false;

    public $translatable = ['name'];
    protected $table = 'countries';
    protected $fillable = ['name','is_active','flag_code'];

    public function governorates()
    {
        return $this->hasMany(Governorate::class , 'country_id','id');
    }
    /*public function getIsActiveAttribute($value)
    {
        return $value == 1 ? 'Active' : 'InActive';
    }*/
    public function users()
    {
        return $this->hasmany(User::class , 'country_id', 'id');
    }
}

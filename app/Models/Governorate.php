<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;
    public $timestamps = false;

    public $translatable = ['name'];
    protected $table = 'governorates';
    protected $fillable = ['name','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}

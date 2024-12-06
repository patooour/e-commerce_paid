<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    public $timestamps = false;

    public $translatable = ['name'];
    protected $table = 'cities';
    protected $fillable = ['name','governorate_id','is_active'];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id','id');
    }

}

<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use Sluggable , HasTranslations;

    protected $table = 'brands';
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'slug',
        'status',
        'logo'

    ];
    public $timestamps = true;
    public function sluggable(): array
    {
        return [
            'slug' =>  [
                'source' => 'name'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d h:i A', strtotime($value));
    }
    public function getLogoAttribute($value)
    {
        return  'uploads/brands/'. $value;
    }
}

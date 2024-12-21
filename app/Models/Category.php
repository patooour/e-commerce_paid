<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use Sluggable , HasTranslations;

    protected $table = 'categories';
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'status',
        'parent'

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

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d h:i A', strtotime($value));
    }
    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent');
    }
    public function children()
    {
        return $this->hasMany(Category::class , 'parent');
    }
}

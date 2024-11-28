<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;


    protected $table = 'roles';
    protected $fillable = [
        'role',
        'permissions',
        'created_at',
        'updated_at'
    ];

    public $translatable = ['role'];

    public function getPermissionsAttribute($value)
    {
        return json_decode($value);
    }

    public function admins()
    {
        return $this->hasmany(Admin::class , 'role_id','id');
    }

}

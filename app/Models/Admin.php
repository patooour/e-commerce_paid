<?php
namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'role_id',
        'status',
        'token',
        'remember_token',

    ];
    protected $timestamp = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class , 'role_id', 'id');
    }
    public function hasRole($permission){
        $auth = $this->role;
        if (!$auth){
            return false;
        }

        foreach($auth->permissions as $role){
            if($role == $permission ?? false){
                return true;
            }
        }
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Active' : 'Inactive';
    }

}

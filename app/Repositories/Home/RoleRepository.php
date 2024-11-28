<?php

namespace App\Repositories\Home;

use App\Models\Role;

class RoleRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createRole($request)
    {
        $role = Role::create([
            'role'=>[
                'ar'=>$request->role['ar'],
                'en'=>$request->role['en'],
                ],
            'permissions'=>json_encode($request->permissions)
        ]);
        return $role;
    }
    public function getRoles()
    {
        $roles = Role::select('id','role','permissions')->paginate();
        return $roles;
    }
    public function getRole($id)
    {
       $role =  Role::find($id);
       return $role;
    }
    public function updateRole($request ,$role)
    {
         $role =   $role->update([
               'role'=>[
                   'ar'=>$request->role['ar'],
                   'en'=>$request->role['en'],
               ],
               'permissions'=>json_encode($request->permissions)
           ]);
         return $role;
    }
    public function destroyRole($role)
    {
        return $role->delete();
    }
}

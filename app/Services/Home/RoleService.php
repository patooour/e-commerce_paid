<?php

namespace App\Services\Home;

use App\Repositories\Home\RoleRepository;

class RoleService
{
   protected $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function createRole($request){
        return $this->roleRepository->createRole($request);
    }
    public function getRole( $id){
        return $this->roleRepository->getRole($id);
    }
    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }
    public function updateRole($request ,$id)
    {
        $role =  $this->roleRepository->getRole($id);
        if (!$role){
            return false;
        }
        return $this->roleRepository->updateRole($request, $role);
    }
    public function destroyRole($id)
    {
        $role =  $this->roleRepository->getRole($id);
        if ($role -> admins ->count() > 0 || !$role){
            return false;
        }
        return $this->roleRepository->destroyRole($role);
    }
}

<?php

namespace App\Services\Home;

use App\Models\Admin;
use App\Repositories\Home\AdminRepository;

class AdminService
{
   protected $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function getAdmins()
    {
        $admins = $this->adminRepository->getAdmins();
        return $admins;
    }
    public function getAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin){
            abort(404);
        }
        return $admin;
    }
    public function store($request)
    {
       $admin = $this->adminRepository->store($request);
        return $admin;

    }
    public function update($request, $id){

        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin){
            abort(404);
        }
        $admin = $this->adminRepository->update($request, $admin);
        if (!$admin){
            return false;
        }
        return $admin;
    }
    public function destroy($id){
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin){
            abort(404);
        }
        $admin = $this->adminRepository->destroy($admin);
        return $admin;
    }
    public function changeStatus($id )
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin){
            abort(404);
        }
        $admin->status == 'Active' ? $status = 0 : $status = 1;
        $status = $this->adminRepository->changeStatus($admin , $status);
         return $status;
    }
    public function search($request)
    {
        $admins = $this->adminRepository->search($request);
        return $admins;
    }
}

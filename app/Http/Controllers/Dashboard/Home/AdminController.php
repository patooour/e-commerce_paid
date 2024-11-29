<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\AdminRequest;
use App\Models\Admin;
use App\Services\Home\AdminService;
use App\Services\Home\RoleService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   protected $adminService;
   protected $roleService;
    public function __construct(AdminService $adminService , RoleService $roleService)
    {
        $this->adminService = $adminService;
        $this->roleService = $roleService;
    }

    public function index()
    {
        $admins = $this->adminService->getAdmins();
        $roles = $this->roleService->getRoles();
        return view('dashboard.admins.index', compact('admins' , 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getRoles();
       return view('dashboard.admins.create' , compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $admin = $this->adminService->store($request);
        if (!$admin){
            return redirect()->back()->with(['error'=>'try again later']);
        }
        return redirect()->route('dashboard.admins.index')->with(['success'=>'admin created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$admin = $this->adminService->getAdmin($id)){
            return redirect()->back()->with(['error'=>'admin not found']);
        }
        return view('dashboard.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->roleService->getRoles();
        if (!$admin = $this->adminService->getAdmin($id)){
            return redirect()->back()->with(['error'=>'admin not found']);
        }
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $admin = $this->adminService->update($request , $id);
        if (!$admin){
            return redirect()->back()->with(['error'=>'try again later']);
        }
        return redirect()->route('dashboard.admins.index')->with(['success'=>'admin updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = $this->adminService->destroy($id);
        if (!$admin){
            return redirect()->back()->with(['error'=>'try again later']);
        }
        return redirect()->route('dashboard.admins.index')->with(['success'=>'admin deleted successfully']);
    }
    public function changestatus(string $id)
    {
        $admin = $this->adminService->changeStatus($id);
        if (!$admin){
            return redirect()->back()->with(['error'=>__('dashboard.errors.admin not found')]);
        }
        return redirect()->route('dashboard.admins.index')
            ->with(['success'=>__('dashboard.success.change status successfully' )]);
    }

    public function search(Request $request)
    {
        $admins = $this->adminService->search($request);
        return view('dashboard.admins.includes.ajax-search', compact('admins'));
    }

}

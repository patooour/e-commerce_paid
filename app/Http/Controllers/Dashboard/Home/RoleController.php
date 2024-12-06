<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\RoleRequest;
use App\Models\Role;
use App\Services\Home\RoleService;
use Flasher\Prime\Flasher;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
  public function __construct(RoleService $service)
  {
      $this->roleService = $service;
  }

    public function index()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        if (!$role){
            return redirect()->back()->with(["error" => "Something went wrong"]);
        }
        return redirect()->back()->with(["success" => "role created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleService->getRole($id);
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
       $role =  $this->roleService->updateRole($request, $id);
       if (!$role){
           return redirect()->back()->with(["error" => "Something went wrong"]);
       }
        return redirect()->route('dashboard.roles.index')->with(["success" => "role updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $role = $this->roleService->destroyRole($id);
        if (!$role){  return response() ->json([
            'status'=>404,
            "msg" => "this role belong to admin",
            'data'=>null
        ]);  }
        return response() ->json([
            'status'=>200,
            "msg" => "role deleted successfully",
            'data'=>$role
        ]);


    }
}

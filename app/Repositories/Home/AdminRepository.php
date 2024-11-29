<?php

namespace App\Repositories\Home;

use App\Models\Admin;

class AdminRepository
{

    public function getAdmins()
    {
        $admin = Admin::select('id','name','email','status','role_id','created_at')->paginate(6);
        return $admin;
    }
    public function getAdmin($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }
    public function store($request)
    {
        $admin =  Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);
        return $admin;

    }
    public function update($request, $admin){

        $admin =  $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
            'status' => $request->status,
        ]);
        return $admin;
    }
    public function destroy($admin){
       return $admin->delete();
    }
    public function changeStatus($admin , $status)
    {
        $admin->status = $status;
        $admin->save();
        return $admin;
    }

    public function search($request)
    {
        $admins = Admin::where('name' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('email' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('created_at' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('status' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere(function ($query) use ($request) {
                $query->whereRelation('role' , 'role' , 'LIKE'  , '%' . $request->search_live . '%');
            })
            ->get();
        return $admins;
    }

}

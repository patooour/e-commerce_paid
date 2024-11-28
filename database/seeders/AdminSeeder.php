<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_role = Role::first()->id;
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
        Admin::create([
            'name'=>'ali',
            'email'=>'ali@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
    }
}

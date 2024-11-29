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
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
        Admin::create([
            'name'=>'mostafa',
            'email'=>'mostafa@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
        Admin::create([
            'name'=>'peter',
            'email'=>'peter@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
        Admin::create([
            'name'=>'antsh',
            'email'=>'antsh@gmail.com',
            'password'=>bcrypt('11111111'),
            'role_id'=>$first_role
        ]);
    }
}

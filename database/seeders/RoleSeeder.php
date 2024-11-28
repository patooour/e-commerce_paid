<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [];
        foreach (config('permissions_en') as $key => $value) {
            $permission[] = $key;
        }

        Role::create([
            'role' => [
                'ar'=>'مدير',
                'en'=>'Manager',
            ],
            'permissions' => json_encode($permission)
        ]);
    }
}

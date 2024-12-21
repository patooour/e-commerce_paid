<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [
                [
                    'name'=>['en'=> 'electronics', 'ar' =>'الكترونيات'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'fruits', 'ar' =>'خضراوات'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'shoes', 'ar' =>'احذية'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'clothes', 'ar' =>'ملابس'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'furniture', 'ar' =>'اثاث'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'library', 'ar' =>'مكتبة'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
                [
                    'name'=>['en'=> 'games', 'ar' =>'العاب'] ,
                    'status'=> 1,
                    'parent'=> null,
                ],
            ];

            foreach ($data as $category) {
                Category::create($category);
            }
    }
}

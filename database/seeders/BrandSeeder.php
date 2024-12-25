<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $brands = [
            [
                'name' => ['en' => 'Apple', 'ar' => 'أبل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg',
            ],
            [
                'name' => ['en' => 'Samsung', 'ar' => 'سامسونج'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg',
            ],
            [
                'name' => ['en' => 'Sony', 'ar' => 'سوني'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/15/Sony_logo.svg',
            ],
            [
                'name' => ['en' => 'Nike', 'ar' => 'نايك'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg',
            ],
            [
                'name' => ['en' => 'Adidas', 'ar' => 'أديداس'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg',
            ],
            [
                'name' => ['en' => 'Puma', 'ar' => 'بوما'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fd/Puma_Logo.svg',
            ],
            [
                'name' => ['en' => 'Dell', 'ar' => 'ديل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Dell_Logo.svg',
            ],
            [
                'name' => ['en' => 'HP', 'ar' => 'إتش بي'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3b/HP_logo_2012.svg',
            ],
            [
                'name' => ['en' => 'Lenovo', 'ar' => 'لينوفو'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/23/Lenovo_logo.svg',
            ],
            [
                'name' => ['en' => 'Asus', 'ar' => 'أسوس'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/4d/ASUS_Logo.svg',
            ],
            [
                'name' => ['en' => 'Acer', 'ar' => 'أيسر'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Acer_Logo_2011.svg',
            ],
            [
                'name' => ['en' => 'Microsoft', 'ar' => 'مايكروسوفت'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg',
            ],
            [
                'name' => ['en' => 'Google', 'ar' => 'جوجل'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg',
            ],
            [
                'name' => ['en' => 'Facebook', 'ar' => 'فيسبوك'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg',
            ],
            [
                'name' => ['en' => 'Instagram', 'ar' => 'إنستغرام'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png',
            ],
            [
                'name' => ['en' => 'Twitter', 'ar' => 'تويتر'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/6/60/Twitter_Logo_as_of_2021.svg',
            ],
            [
                'name' => ['en' => 'Amazon', 'ar' => 'أمازون'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg',
            ],
            [
                'name' => ['en' => 'Tesla', 'ar' => 'تسلا'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Tesla_T_symbol.svg',
            ],
            [
                'name' => ['en' => 'Toyota', 'ar' => 'تويوتا'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Toyota_logo.png',
            ],
            [
                'name' => ['en' => 'Ford', 'ar' => 'فورد'],
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Ford_logo_flat.svg',
            ],
            // أكمل بنفس الطريقة لتصل إلى 45 علامة تجارية.
        ];

        // إدخال البيانات في قاعدة البيانات
        foreach ($brands as $brandData) {
            Brand::create($brandData);
        }

    }
}

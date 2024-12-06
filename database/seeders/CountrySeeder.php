<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //  DB::table('countries')->truncate();

        $countries = [
          [
              'id'=>1,
              'phone_code'=>'+20 ',
              'name'=>['en'=>'Egypt' ,'ar'=>'مصر'],
              'flag_code'=>'eg'
          ],
            [
                'id'=>2,
                'phone_code'=>'+969 ',
                'name'=>['en'=>'Saudi' ,'ar'=>'سعودية'],
                'flag_code'=>'sau'
            ],
            [
                'id' => 3,
                'phone_code' => '249',
                'name' => ['en' => 'Sudan', 'ar' => 'السودان'],
                'flag_code' => 'sd',
            ],
            [
                'id' => 4,
                'phone_code' => '971',
                'name' => ['en' => 'United Arab Emirates', 'ar' => 'الإمارات العربية المتحدة'],
                'flag_code' => 'ae',
            ],
            [
                'id' => 5,
                'phone_code' => '212',
                'name' => ['en' => 'Morocco', 'ar' => 'المغرب'],
                'flag_code' => 'ma',
            ],
            [
                'id' => 6,
                'phone_code' => '962',
                'name' => ['en' => 'Jordan', 'ar' => 'الأردن'],
                'flag_code' => 'jo',
            ],
            [
                'id' => 7,
                'phone_code' => '961',
                'name' => ['en' => 'Lebanon', 'ar' => 'لبنان'],
                'flag_code' => 'lb',
            ],
        ];

        foreach ($countries as $country) {
                Country::create($country);
        }
    }
}

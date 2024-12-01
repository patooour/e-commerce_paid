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
              'name'=>['en'=>'Egypt' ,'ar'=>'مصر']
          ],
            [
                'id'=>2,
                'phone_code'=>'+969 ',
                'name'=>['en'=>'Saudi' ,'ar'=>'سعودية']
            ],
        ];

        foreach ($countries as $country) {
                Country::create($country);
        }
    }
}

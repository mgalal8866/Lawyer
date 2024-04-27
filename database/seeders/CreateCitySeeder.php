<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\city;
use App\Models\region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $jsoncity = File::get('public/city/cities.json');
        $city = json_decode($jsoncity);

        foreach ($city as $key => $value) {
            city::create([
                "name" => $value->city_name_ar,
            ]);
        }
        $jsonregion = File::get('public/city/regions.json');
        $region = json_decode($jsonregion);
        foreach ($region as $key => $value) {
            Area::create([
                "city_id" => $value->city_id,
                "name" => $value->region_name_ar,

            ]);
        }
    }
}

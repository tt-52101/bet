<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Championships\Models\Country;
use Illuminate\Support\Facades\Schema;
use App\Models\Country as ApiCountry;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Country::truncate();
        Schema::enableForeignKeyConstraints();

        $api_countries = ApiCountry::get();

        foreach ($api_countries as $country) {
            if(is_null($country->code)){
                break;
            }
            Country::create([
                'name' => $country->name,
                'code' => $country->code,
                'flag' => $country->flag
            ]);
        }
    }
}

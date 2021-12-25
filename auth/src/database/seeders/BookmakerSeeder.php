<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Bookmaker;
use App\Models\Bookmakers as BookmakerApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BookmakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Bookmaker::truncate();
        Schema::enableForeignKeyConstraints();

        $bookmakers = BookmakerApi::get();

        foreach ($bookmakers as $bookmaker) {
            Bookmaker::create([
                'name' => $bookmaker->name,
                'api_id' => $bookmaker->id,
            ]);
        }
    }
}

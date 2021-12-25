<?php

namespace Database\Seeders;

use App\Http\Championships\Models\BetCategory;
use App\Http\Championships\Models\Bookmaker;
use App\Models\Bet as BetApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BetCategory::truncate();
        Schema::enableForeignKeyConstraints();

        $bets = BetApi::get();

        foreach ($bets as $bet) {
            BetCategory::create([
                'name' => $bet->name,
                'title' => $bet->name,
                'api_id' => $bet->id,
            ]);
        }
    }
}

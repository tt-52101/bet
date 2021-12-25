<?php

namespace Database\Seeders;

use App\Http\Championships\Models\BetCategory;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\Odd;
use App\Http\Championships\Models\Bookmaker;
use App\Models\Odd as OddApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Odd::truncate();
        Schema::enableForeignKeyConstraints();

        $odds = OddApi::all();

        foreach ($odds as $odd) {
            $fixture_api_id = $odd->fixture['id'];
            $fixture = Fixture::where('api_id', $fixture_api_id)->first();

            $this->bookmakers($odd['bookmakers'], $fixture->id);
        }
    }

    public function bookmakers($bookmakers, $fixture_id)
    {
        foreach ($bookmakers as $bookmaker) {
            $id = $bookmaker['id'];
            $bookmaker_db = Bookmaker::where('bookmakers.api_id', $id)->first();

            if (!isset($bookmaker_db)) {
                var_dump($bookmaker['id']);
                break;
            }

            $this->bets($bookmaker['bets'], $fixture_id, $bookmaker_db->id);
        }
    }

    public function bets($bets, $fixture_id, $bookmaker_id)
    {
        foreach ($bets as $bet) {
            $category = BetCategory::where('api_id', $bet['id'])->first();
            if (!$category) {
                break;
            }
            $this->odds($bet['values'], $fixture_id, $bookmaker_id, $category->id);
        }
    }

    public function odds($odds, $fixture_id, $bookmaker_id, $category_id)
    {
        foreach ($odds as $odd) {
            Odd::create([
                'value' => $odd['value'],
                'odd' => round($odd['odd'],2),
                'fixture_id' => $fixture_id,
                'bookmaker_id' => $bookmaker_id,
                'bet_category_id' => $category_id,
            ]);
        }
    }
}

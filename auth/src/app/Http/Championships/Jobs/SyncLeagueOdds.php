<?php

namespace App\Http\Championships\Jobs;

use App\Api\FootballApi\Odds\OddsApi;
use App\Api\FootballApi\Odds\OddsApiInterface;
use App\Api\FootballApi\Odds\OddsParser;
use App\Http\Championships\Models\Bookmaker;
use App\Http\Championships\Models\BetCategory;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Odd;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\FootballApi\Fixtures\FixturesApi;
use App\Http\Championships\Models\Fixture;

class SyncLeagueOdds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public OddsApiInterface $repository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private League $league,
        private string $season,
    )
    {
        $this->repository = new OddsApi();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $league_id = (int)$this->league->api_id;

        $repository = new $this->repository;

        $json = $repository::get($league_id, $this->season)['response'];

        $fixtures = (new OddsParser($json))->fixtures();
        $this->createAverageBets($fixtures);
        $this->updateOrCreateOdds($fixtures);
    }

    public function createAverageBets(array $fixtures)
    {
        foreach ($fixtures as $fixture) {
            $stats = $fixture->calcStats()->stats;
            foreach ($stats as $category => $bets) {
                foreach ($bets as $bet){
                    $this->createMatchWinner($fixture->id,  $bet['category_name'], $bet['value'], $bet['avg']);
                }
            }
        }
    }

    public function createMatchWinner(int $fixture_api_id, string $category_name, string $value, float $odd)
    {
        $bet_category = BetCategory::where('name', $category_name)->first();
        $bookmaker = Bookmaker::where('name', 'Default')->first();
        $fixture = Fixture::where('api_id', $fixture_api_id)->first();
        if(!$fixture){
            return;
        }
        $odd = Odd::updateOrCreate([
            'bookmaker_id' => $bookmaker->id,
            'bet_category_id' => $bet_category->id,
            'fixture_id' => $fixture->id,
            'odd' => $odd
        ],[
            'value' => $value,
        ]);

    }

    public function updateOrCreateOdds(array $fixtures)
    {
        foreach ($fixtures as $fixture) {
            $job = new SyncFixtureOdds($fixture);
            dispatch($job);
        }
    }
}

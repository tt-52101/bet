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
use App\Api\FootballApi\Fixtures\TeamsApi;
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
        private int $page = 1
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

        $repository = new $this->repository;
        $this->getOdds($this->page, $repository);
    }

    public function getOdds($page , $repository){

        $league_id = (int)$this->league->api_id;
        $response = $repository::get($league_id, $this->season, $page);

        $odds = $response['response'];
        $total = $response['paging']['total'];
        $current = $response['paging']['current'];
        $this->syncOdds($odds);
        $this->league->update([
            'odds_sync' => Carbon::now()
        ]);
        if ($total > $current){
            $job = new SyncLeagueOdds($this->league, $this->season, $page+1);
            dispatch($job);
        }
    }

    public function syncOdds($odds){
        $fixtures = (new OddsParser($odds))->fixtures();
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

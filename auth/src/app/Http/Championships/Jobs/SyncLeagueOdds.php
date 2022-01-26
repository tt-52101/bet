<?php

namespace App\Http\Championships\Jobs;

use App\Api\FootballApi\Fixtures\FixturesApiInterface;
use App\Api\FootballApi\Odds\OddsApi;
use App\Api\FootballApi\Odds\OddsApiInterface;
use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\FootballApi\Fixtures\FixturesApi;

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
        $league_id = (int) $this->league->api_id;

        $repository = new $this->repository;

        $fixtures = $repository::get($league_id, $this->season)['response'];
        $this->updateOrCreateOdds($fixtures);
    }

    public function updateOrCreateOdds(Array $fixtures)
    {
        foreach ($fixtures as $fixture) {
            $job = new SyncFixtureOdds($fixture);
            dispatch($job);
        }
    }
}

<?php

namespace App\Http\Championships\Jobs;

use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\Odds\FixturesApi;

class SyncLeagueFixtures implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private League $league,
        private string $from_date,
        private string $to_date
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $season = (int) Carbon::parse($this->from_date)->format('Y');
        $from = Carbon::parse($this->from_date)->format('Y-m-d');
        $to = Carbon::parse($this->to_date)->format('Y-m-d');
        $league_id = (int) $this->league->api_id;

        $fixtures = FixturesApi::get($league_id, $season, $from, $to)['response'];
        $this->updateOrCreateFixture($fixtures);
    }

    public function updateOrCreateFixture(Array $fixtures)
    {
        foreach ($fixtures as $fixture) {
            $sync_fixture = new SyncFixture($this->league, $fixture);
            dispatch($sync_fixture);
        }
    }
}

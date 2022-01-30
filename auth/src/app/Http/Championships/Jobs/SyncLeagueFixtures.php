<?php

namespace App\Http\Championships\Jobs;

use App\Api\FootballApi\Fixtures\FixturesApiInterface;
use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\FootballApi\Fixtures\FixturesApi;

class SyncLeagueFixtures implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public FixturesApiInterface $repository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private League $league,
        private string $from_date,
        private string $to_date,
        private int $season = 2020
    )
    {
        $this->repository = new FixturesApi();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $from = Carbon::parse($this->from_date)->format('Y-m-d');
        $to = Carbon::parse($this->to_date)->format('Y-m-d');
        $league_id = (int) $this->league->api_id;

        $repository = new $this->repository;

        $fixtures = $repository::get($league_id, $this->season, $from, $to)['response'];
        $this->updateOrCreateFixture($fixtures);
    }

    public function updateOrCreateFixture(Array $fixtures)
    {
        foreach ($fixtures as $fixture) {
            $sync_fixture = new SyncFixture($this->league, $fixture);
            dispatch($sync_fixture);
        }
        $this->league->update([
            'fixtures_sync' => Carbon::now()
        ]);
    }
}

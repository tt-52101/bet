<?php

namespace App\Http\Championships\Jobs;

use App\Http\Championships\Models\Bookmaker;
use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\Odds\FixturesApi;
use App\Http\Championships\Models\Fixture;
use App\Api\Models\Fixture as FixtureResponse;

class SyncFixtureOdds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private FixtureResponse $fixture
    )
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fixture_id = $this->fixture->id;
        $fixture = $this->findFixture($fixture_id);
        if (!is_null($fixture)) {
            $this->syncBookmakerOdds($fixture, $this->fixture->bookmakers);
        }
    }

    public function syncBookmakerOdds(Fixture $fixture, array $bookmakers)
    {
        foreach ($bookmakers as $book) {
            $bookmaker = Bookmaker::where('api_id', $book->id)->first();

            $job = new SyncBookmakereOdds($fixture, $bookmaker, $book->bets);
            dispatch($job);
        }
    }

    public function findFixture($id)
    {
        return Fixture::where('api_id', $id)->first();
    }
}

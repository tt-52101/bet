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
use App\Http\Championships\Models\Fixture;

class SyncFixture implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private League $league,
        private array $fixture
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
        $fixture_id = $this->fixture['fixture']['id'];
        $fixture = $this->findFixture($fixture_id);

        if(!$fixture) {
            $fixture = $this->createFixture($this->fixture);
        }
    }

    public function findFixture($id){
        return Fixture::where('api_id', $id)->first();
    }

    public function createFixture(array $json){
        return Fixture::createFromJson($json);
    }
}

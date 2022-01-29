<?php

namespace App\Http\Championships\Tests\Feature;

use App\Api\FootballApi\Odds\OddsApiMock;
use App\Http\Championships\Jobs\SyncLeagueOdds;
use App\Http\Championships\Models\Fixture;
use Database\Seeders\BetCategorySeeder;
use Database\Seeders\FixtureStatusSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Championships\Models\League;
use App\Http\Championships\Tests\Helpers\FixtureHelper;
use App\Http\Championships\Models\Odd;

class LeagueOddSyncFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_new_fixtures_are_created()
    {

        FixtureHelper::init();
        $this->seed(FixtureStatusSeeder::class);
        $this->seed(BetCategorySeeder::class);

        FixtureHelper::createFixture(1,1);
        FixtureHelper::createBookmaker(0, 'Default', 'Default');

        FixtureHelper::createBookmaker(1, 'Bookmaker 1', 'Bookmaker 1');
        FixtureHelper::createBookmaker(2, 'Bookmaker 2', 'Bookmaker 2');

        $league = League::first();

        $job = new SyncLeagueOdds($league, 1);
        $job->repository = new OddsApiMock();
        dispatch($job);

        $odds = Odd::all()->count();
        $this->assertTrue($odds === 9);
    }

}

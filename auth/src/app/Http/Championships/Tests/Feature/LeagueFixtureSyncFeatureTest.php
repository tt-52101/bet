<?php

namespace App\Http\Championships\Tests\Feature;

use App\Api\FootballApi\Fixtures\FixturesApiMock;
use App\Http\Championships\Jobs\SyncLeagueFixtures;
use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Fixture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use App\Http\Championships\Tests\Helpers\FixtureHelper;

class LeagueFixtureSyncFeatureTest extends TestCase
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

        $league = League::first();
        $job = new SyncLeagueFixtures($league, '', '');
        $job->repository = new FixturesApiMock();

        dispatch($job);

        $fixtures = Fixture::all()->count();

        $this->assertTrue($fixtures === 2);
    }
}

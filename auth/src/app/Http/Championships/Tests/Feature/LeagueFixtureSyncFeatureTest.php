<?php

namespace App\Http\Championships\Tests\Feature;

use App\Api\FootballApi\Fixtures\FixturesApi;
use App\Api\FootballApi\Fixtures\FixturesApiMock;
use App\Http\Championships\Jobs\SyncLeagueFixtures;
use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Fixture;
use Database\Seeders\FixtureStatusSeeder;
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
        $this->seed(FixtureStatusSeeder::class);

        $league = League::first();

        $job = new SyncLeagueFixtures($league, '', '');
        $job->repository = new FixturesApiMock();
        dispatch($job);

        $fixtures = Fixture::all()->count();
        $this->assertTrue($fixtures === 2);
    }

    public function test_existing_fixtures_are_updated()
    {
        FixtureHelper::init();
        $this->seed(FixtureStatusSeeder::class);

        $fixture = FixtureHelper::createFixture(2, 1, 'NS');

        $league = League::find(1);

        $job = new SyncLeagueFixtures($league, '', '');
        $job->repository = new FixturesApiMock();
        dispatch($job);

        $sync_fixture = Fixture::find($fixture->id);
        $fixtures = Fixture::all()->count();

        $this->assertTrue($fixtures === 2);
        $this->assertTrue($sync_fixture->status->name !== 'NS');
    }
}

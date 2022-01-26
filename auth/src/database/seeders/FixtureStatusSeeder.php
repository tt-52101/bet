<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use App\Models\Fixture as FixtureApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FixtureStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        FixtureStatus::truncate();
        Schema::enableForeignKeyConstraints();

        $statuses = [
            [
                'name' => 'TBD',
                'title' => 'Time To Be Defined'
            ],
            [
                'name' => 'NS',
                'title' => 'Not Started'
            ],
            [
                'name' => '1H',
                'title' => 'First Half, Kick Off'
            ],
            [
                'name' => 'HT',
                'title' => 'Halftime'
            ],
            [
                'name' => '2H',
                'title' => 'Second Half, 2nd Half Started'
            ],
            [
                'name' => 'ET',
                'title' => 'Extra Time'
            ],
            [
                'name' => 'P',
                'title' => 'Penalty In Progress'
            ],
            [
                'name' => 'FT',
                'title' => 'Match Finished'
            ],
            [
                'name' => 'AET',
                'title' => 'Match Finished After Extra Time'
            ],
            [
                'name' => 'PEN',
                'title' => 'Match Finished After Penalty'
            ],
            [
                'name' => 'BT',
                'title' => 'Break Time (in Extra Time)'
            ],
            [
                'name' => 'SUSP',
                'title' => 'Match Suspended'
            ],
            [
                'name' => 'INT',
                'title' => 'Match Interrupted'
            ],
            [
                'name' => 'PST',
                'title' => 'Match Postponed'
            ],
            [
                'name' => 'CANC',
                'title' => 'Match Cancelled'
            ],
            [
                'name' => 'ABD',
                'title' => 'Match Abandoned'
            ],
            [
                'name' => 'AWD',
                'title' => 'Technical Loss'
            ],
            [
                'name' => 'WO',
                'title' => 'WalkOver'
            ],
            [
                'name' => 'LIVE',
                'title' => 'In Progress'
            ],
        ];

        foreach ($statuses as $status){
            FixtureStatus::create($status);
        }
    }
}

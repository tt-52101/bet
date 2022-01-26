<?php

namespace Database\Seeders;

use App\Http\Championships\Models\FixtureStatus;
use App\Models\User;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            TableSeeder::class,
            PolicySeeder::class,
            MenuSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            LeagueSeeder::class,
            TeamSeeder::class,
            BookmakerSeeder::class,
            BetCategorySeeder::class,
            FixtureStatusSeeder::class,
            FixtureSeeder::class,
            // OddSeeder::class,
        ]);
    }
}

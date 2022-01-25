<?php

namespace Database\Seeders;

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
            LanguageSeeder::class,
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
            FixtureSeeder::class,
            // OddSeeder::class,
        ]);
    }
}

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
            UserSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Core\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Core\Models\Role;
use Exception;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $user = User::create([
            'name' => 'Ben Bodan',
            'email' => 'ben.bodan@gmail.com',
            'password' =>'winter'
        ]);
        $admin = Role::where('name', 'admin')->first();
        $user->roles()->sync($admin);

        $user = User::create([
            'name' => 'BetMixer',
            'email' => 'betmixer@gmail.com',
            'password' =>'winter'
        ]);

        $user = User::create([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' =>'winter'
        ]);
    }
}

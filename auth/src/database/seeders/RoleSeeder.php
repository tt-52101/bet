<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Core\Models\Role;
use App\Core\Models\RoleTranslation;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $this->createRoles();
    }

    public function createRoles(){
        $this->createRole('admin', 'Admin');
        $this->createRole('guest', 'Guest');
    }

    public function createRole($name, $title) {
        $role = Role::create([
            'name' => $name,
            'title' => $title,
            'active' => true,
            'public' => true,
        ]);
    }
}

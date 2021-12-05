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
        RoleTranslation::truncate();
        Schema::enableForeignKeyConstraints();

        $this->createRoles();
    }

    public function createRoles(){
        $this->createRole('admin','Διαχειριστής', 'Admin');
    }

    public function createRole($name, $title_gr, $title) {
        $role = Role::create([
            'name' => $name,
            'active' => true,
            'public' => true,
        ]);

        $tr = RoleTranslation::create([
            'title' => $title,
            'role_id' => $role->id,
            'lang_id' => 2,
        ]);

        $tr = RoleTranslation::create([
            'title' => $title_gr,
            'role_id' => $role->id,
            'lang_id' => 1,
        ]);
    }
}

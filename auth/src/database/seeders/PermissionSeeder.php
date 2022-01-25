<?php

namespace Database\Seeders;

use App\Core\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Core\Models\Role;
use App\Core\Models\RoleTranslation;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $this->createRoles();
    }

    public function createRoles(){
        $this->create('activate-users', 'Activate Users');
        $this->create('receive-notifications', 'Receive Notifications');
    }

    public function create($name, $title) {
        $role = Permission::create([
            'name' => $name,
            'title' => $title,
            'active' => true,
        ]);
    }
}

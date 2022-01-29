<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Core\Models\Role;
use App\Core\Models\Policy;
use App\Core\Models\Menu;
use App\Core\Models\Table;
use Nette\Schema\Schema;

class PlayerSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'player')->first();
        $this->policies($role);
        $this->menus($role);
    }


    public function menus(Role $role)
    {
        $names = [
            'backend',
            'side_bar',
            'home',
        ];

        $menus = Menu::whereIn('name', $names)->get();

        $role->menus()->sync($menus);
    }

    public function policies(Role $role)
    {
        Policy::where('role_id', $role->id)->delete();

        $polices = [
            [
                'table' => 'menu',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'championship',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'member',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'fixture',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'odd',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'team',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
            [
                'table' => 'bet',
                'create' => false,
                'read' => true,
                'update' => false,
                'delete' => false
            ],
        ];

        foreach ($polices as $policy) {
            $table = Table::where('name', $policy['table'])->first();
            Policy::create([
                'table_id' => $table->id,
                'role_id' => $role->id,
                'create' => $policy['create'],
                'read' => $policy['read'],
                'update' => $policy['update'],
                'delete' => $policy['delete'],
            ]);
        }
    }
}

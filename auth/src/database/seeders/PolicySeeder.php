<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Core\Models\Table;
Use App\Core\Models\Policy;
use App\Core\Models\Role;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $tables = Table::all();

        $role = Role::where('name', 'admin')->first();

        foreach ($tables as $table) {
            Policy::updateOrCreate(
                [
                    'role_id' => $role->id,
                    'table_id' => $table->id,
                ],
                [
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
                'own' => false,
            ]);
        }
    }
}

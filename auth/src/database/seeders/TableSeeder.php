<?php

namespace Database\Seeders;

use App\Core\Models\Language;
use App\Core\Models\LanguageTranslation;
use Illuminate\Database\Seeder;
use App\Core\Models\Table;
use App\Core\Models\TableTranslation;
use Illuminate\Support\Facades\Schema;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Table::truncate();
        Schema::enableForeignKeyConstraints();


        $tables = [];

        $tables[] = [
            'title' => 'Language',
            'name' => 'language',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Users',
            'name' => 'user',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Policy',
            'name' => 'policy',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Permission',
            'name' => 'permission',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Role',
            'name' => 'role',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Table',
            'name' => 'table',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Menu',
            'name' => 'menu',
            'user_entries' => false
        ];

        $tables[] = [
            'title' => 'Bet Categories',
            'name' => 'bet_category',
            'user_entries' => false
        ];

        $this->createTables($tables);
    }

    public function createTables($tables) {

        foreach ($tables as $table) {
            $db_table = Table::whereName($table['name'])->first();

            if($db_table) {
                continue;
            }

            $tb = Table::create([
                'name' => $table['name'],
                'title' => $table['title'],
                'user_entries' => $table['user_entries']
            ]);
        }
    }
}

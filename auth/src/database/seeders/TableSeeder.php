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
        TableTranslation::truncate();
        Schema::enableForeignKeyConstraints();


        $tables = [];

        $tables[] = [
            'title' => 'Language',
            'title_gr' => 'Γλώσσες',
            'name' => 'language',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Users',
            'title_gr' => 'Χρήστες',
            'name' => 'user',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Policy',
            'title_gr' => 'Δικαιώματα Πινάκων',
            'name' => 'policy',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Permission',
            'title_gr' => 'Δικαιώματα',
            'name' => 'permission',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Role',
            'title_gr' => 'Ρόλοι',
            'name' => 'role',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Table',
            'title_gr' => 'Πίνακες',
            'name' => 'table',
            'user_entries' => false,
        ];

        $tables[] = [
            'title' => 'Menu',
            'title_gr' => 'Μενού',
            'name' => 'menu',
            'user_entries' => false
        ];

        $tables[] = [
            'title' => 'Bet Categories',
            'title_gr' => 'Bet Categories',
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
                'user_entries' => $table['user_entries']
            ]);

            TableTranslation::create([
                'title' => $table['title'],
                'table_id' => $tb->id,
                'lang_id' => 1,
            ]);

            TableTranslation::create([
                'title' => $table['title_gr'],
                'table_id' => $tb->id,
                'lang_id' => 2,
            ]);
        }
    }
}

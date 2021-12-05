<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Core\Models\Language;
use App\Core\Models\LanguageTranslation;
use Illuminate\Support\Facades\Schema;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Language::truncate();
        LanguageTranslation::truncate();
        Schema::enableForeignKeyConstraints();


        $lang_1 = Language::create([
            'code' => 'en',
            'active' => true
        ]);

        $lang_2 = Language::create([
            'code' => 'gr',
            'active' => true
        ]);

        $lang_tr_1 = LanguageTranslation::create([
            'Title' => 'English',
            'language_id' => $lang_1->id,
            'lang_id' => $lang_1->id
        ]);

        $lang_tr_1_2 = LanguageTranslation::create([
            'Title' => 'Αγγλικά',
            'language_id' => $lang_1->id,
            'lang_id' => $lang_2->id
        ]);

        $lang_tr_2 = LanguageTranslation::create([
            'Title' => 'Greek',
            'language_id' => $lang_2->id,
            'lang_id' => $lang_1->id
        ]);

        $lang_tr_2_2 = LanguageTranslation::create([
            'Title' => 'Ελληνικά',
            'language_id' => $lang_2->id,
            'lang_id' => $lang_2->id
        ]);
    }
}

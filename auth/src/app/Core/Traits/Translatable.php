<?php

namespace App\Core\Traits;

use App\Core\Models\Language;
use Illuminate\Database\Eloquent\Builder;

trait Translatable
{

    public function addSelects(&$q, $columns)
    {
        foreach ($columns as $column) {
            $q->addSelect($column);
        }
    }

    public function scopeWithTranslated($q, $tables = [])
    {
        $tables = $this->joins;

        foreach ($tables as $table) {
            $join_table = $table['join'];
            $alias = isset($table['alias']) ? $table['alias'] : $table['join'];
            $id = $table['id'];
            $on = $table['on'];
            $on_id = $table['on_id'];
            $columns = $table['select'];

            $this->addSelects($q, $columns);

            $q->leftJoin("$join_table as $alias", function ($join) use ($table, $join_table, $alias, $id, $on, $on_id) {
                $join->on($alias . "." . $id, $on . "." . $on_id);
                $join->when(array_key_exists('translatable', $table) && $table['translatable'], function ($join) use ($join_table, $alias, $id, $on, $on_id) {
                    $join->whereRaw("
                        case when exists(
                            select trans.id from $join_table as trans
                            where trans.$id = $on.$on_id and trans.lang_id = $this->lang_id
                        )
                        then
                            $alias.lang_id = $this->lang_id
                        else
                            $alias.lang_id = 1
                        end
                    ");
                });

            });
        }
    }

    protected function getLanguage(string|int $lang)
    {
        if (is_numeric($lang)) {
            return $lang;
        } else {
            return Language::where('languages.code', $lang)->first()->id;
        }
    }
}

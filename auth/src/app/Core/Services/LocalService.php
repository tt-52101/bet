<?php

namespace App\Core\Services;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LocalService implements UrlRoutable
{
    protected $filters;
    protected $entry;
    protected $request;
    protected $primaryKey = 'id';
    protected $lang_id = 1;
    protected bool $translatable = true;
    protected string $table;

    public function __construct(Request $request)
    {
        $this->request = $request;

        if ($request->has('_lang_id')) {
            $this->lang_id = $request->get('_lang_id');
        }
    }

    public function filter($filters)
    {
        $this->filters = $filters;
        return $this;
    }

    public function get()
    {
        return $this->entry;
    }

    public function find($id)
    {
        $this->entry = $this->model::lang($this->lang_id)->find($id);
        return $this;
    }

    public function getRouteKey()
    {
        return $this->entry->{$this->getRouteKeyName()};
    }

    public function getRouteKeyName()
    {
        return $this->primaryKey;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $field = $field ?? $this->getRouteKeyName();
        $this->entry = new $this->model();

        if ($this->translatable) {
            $this->entry = $this->entry->lang($this->lang_id);
        }

        $this->entry = $this->entry->where($this->table . "." . $field, $value)->first();
        return $this;
    }

    public function __get($key)
    {
        $user = $this->entry->toArray();
        return $this->entry[$key];
    }

    public function resolveChildRouteBinding($childType, $value, $field)
    {
    }

    protected function updateWithTranslated(Collection $data)
    {
        $lang_id = $data['_lang_id'];
        $model = $this->entry;

        DB::transaction(function () use (&$model, $data, $lang_id) {

            $translated_columns = $model->translated_columns;
            $columns = $data->except($model->translated_columns)->toArray();

            $model->update($columns);
            $translated = $data->only($translated_columns)->toArray();

            $model->translations()
                ->updateOrCreate(
                    [
                        'lang_id' => $lang_id,
                    ],
                    $translated
                );
        });

        return $this->find($model->id);
    }

    public function createWithTranslated(Collection $data)
    {

        $model = $this->model;
        $translated = $this->translated;

        $lang_id = $data['_lang_id'];

        DB::transaction(function () use (&$model, $translated, $data, $lang_id) {

            $translated_columns = $model::$translated_columns;
            $translation_key = $model::$translation_key;


            $columns = $data->except($translated_columns)->toArray();
            $model = $model::create($columns);

            $translated_columns = $data->only($translated_columns);
            $translated_columns = $translated_columns->merge([
                'lang_id' => $lang_id,
                "$translation_key" => $model->id
            ])->toArray();

            $translated::create($translated_columns);
        });
        return $this->find($model->id);
    }
}

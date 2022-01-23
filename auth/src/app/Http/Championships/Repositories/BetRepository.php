<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\BetFilters;
use App\Http\Championships\Models\Bet;
use App\Core\Services\LocalService;

class BetRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'championship_bets';
    protected string $model = Bet::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new BetFilters($this->request);
        return Bet::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Bet::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Bet::create($data);
        return $this->entry;
    }
}

<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\MemberFilters;
use App\Http\Championships\Models\Member;
use App\Core\Services\LocalService;

class MemberRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'championship_user';
    protected string $model = Member::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new MemberFilters($this->request);
        return Member::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Member::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Member::create($data);
        return $this->entry;
    }
}

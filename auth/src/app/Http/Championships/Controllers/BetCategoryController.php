<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BetCategoryRepository;
use App\Http\Championships\Resources\BetCategory as BetCategoryResource;
use App\Http\Championships\Resources\BetCategoryCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\BetCategory;
use Illuminate\Support\Facades\Gate;

class BetCategoryController extends ApiController
{

    public function index(BetCategoryRepository $countries)
    {
        if (Gate::denies('view', new BetCategory())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $countries = $countries->paginate(12);
        return new BetCategoryCollection($countries);
    }

    public function show(BetCategoryRepository $bet_category)
    {
        if (Gate::denies('view', new BetCategory())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new BetCategoryResource($bet_category);
    }

    public function update(BetCategoryRepository $bet_category)
    {
        if (Gate::denies('update', new BetCategory())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $bet_category->update(request()->all());

        return [
            'message' => 'BetCategory Updated Successfully',
            'entry' => $bet_category
        ];
    }

    public function store(BetCategoryRepository $bet_category)
    {
        if (Gate::denies('create', new BetCategory())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $bet_category = $bet_category->create(request()->all());

        return [
            'message' => 'BetCategory Created Successfully',
            'entry' => $bet_category
        ];
    }
}

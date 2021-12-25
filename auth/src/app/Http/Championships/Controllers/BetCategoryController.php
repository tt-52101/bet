<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BetCategoryRepository;
use App\Http\Championships\Resources\BetCategory as BetCategoryResource;
use App\Http\Championships\Resources\BetCategoryCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\BetCategory;

class BetCategoryController extends ApiController
{

    public function index(BetCategoryRepository $countries)
    {
        $countries = $countries->paginate(12);
        return new BetCategoryCollection($countries);
    }

    public function show(BetCategoryRepository $bet_category)
    {
        return new BetCategoryResource($bet_category);
    }

    public function update(BetCategoryRepository $bet_category)
    {

        $bet_category->update(request()->all());

        return [
            'message' => 'BetCategory Updated Successfully',
            'entry' => $bet_category
        ];
    }

    public function store(BetCategoryRepository $bet_category)
    {

        $bet_category = $bet_category->create(request()->all());

        return [
            'message' => 'BetCategory Created Successfully',
            'entry' => $bet_category
        ];
    }
}

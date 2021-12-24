<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\CountryRepository;
use App\Http\Championships\Resources\Country as CountryResource;
use App\Http\Championships\Resources\CountryCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Country;

class CountryController extends ApiController
{

    public function index(CountryRepository $countries)
    {
        $countries = $countries->paginate(10);
        return new CountryCollection($countries);
    }

    public function show(CountryRepository $country)
    {
        return new CountryResource($country);
    }

    public function update(CountryRepository $country)
    {

        $country->update(request()->all());

        return [
            'message' => 'Country Updated Successfully',
            'entry' => $country
        ];
    }

    public function store(CountryRepository $country)
    {

        $country = $country->create(request()->all());

        return [
            'message' => 'Country Created Successfully',
            'entry' => $country
        ];
    }
}
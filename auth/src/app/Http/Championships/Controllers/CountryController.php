<?php

namespace App\Http\Championships\Controllers;

use App\Core\Auth\Models\User;
use App\Http\Championships\Repositories\CountryRepository;
use App\Http\Championships\Resources\Country as CountryResource;
use App\Http\Championships\Resources\CountryCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Country;
use Illuminate\Support\Facades\Gate;

class CountryController extends ApiController
{
    public int $per_page = 24;

    public function index(CountryRepository $countries)
    {
        if (Gate::denies('view', new Country())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
        return new CountryCollection($countries);
    }

    public function show(CountryRepository $country)
    {
        if (Gate::denies('view', new Country())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new CountryResource($country);
    }

    public function update(CountryRepository $country)
    {
        if (Gate::denies('update', new Country())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $country->update(request()->all());

        return [
            'message' => 'Country Updated Successfully',
            'entry' => $country
        ];
    }

    public function store(CountryRepository $country)
    {
        if (Gate::denies('create', new Country())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $country = $country->create(request()->all());

        return [
            'message' => 'Country Created Successfully',
            'entry' => $country
        ];
    }
}

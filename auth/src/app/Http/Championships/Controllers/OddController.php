<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\OddRepository;
use App\Http\Championships\Resources\Odd as OddResource;
use App\Http\Championships\Resources\OddCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Odd;

class OddController extends ApiController
{

    public $per_page = 10;
    public function index(OddRepository $countries)
    {
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
        return new OddCollection($countries);
    }

    public function show(OddRepository $odd)
    {
        return new OddResource($odd);
    }

    public function update(OddRepository $odd)
    {

        $odd->update(request()->all());

        return [
            'message' => 'Odd Updated Successfully',
            'entry' => $odd
        ];
    }

    public function store(OddRepository $odd)
    {

        $odd = $odd->create(request()->all());

        return [
            'message' => 'Odd Created Successfully',
            'entry' => $odd
        ];
    }
}

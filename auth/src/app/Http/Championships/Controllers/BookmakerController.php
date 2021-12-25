<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BookmakerRepository;
use App\Http\Championships\Resources\Bookmaker as BookmakerResource;
use App\Http\Championships\Resources\BookmakerCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Bookmaker;

class BookmakerController extends ApiController
{

    public function index(BookmakerRepository $countries)
    {
        $countries = $countries->paginate(10);
        return new BookmakerCollection($countries);
    }

    public function show(BookmakerRepository $bookmaker)
    {
        return new BookmakerResource($bookmaker);
    }

    public function update(BookmakerRepository $bookmaker)
    {

        $bookmaker->update(request()->all());

        return [
            'message' => 'Bookmaker Updated Successfully',
            'entry' => $bookmaker
        ];
    }

    public function store(BookmakerRepository $bookmaker)
    {

        $bookmaker = $bookmaker->create(request()->all());

        return [
            'message' => 'Bookmaker Created Successfully',
            'entry' => $bookmaker
        ];
    }
}

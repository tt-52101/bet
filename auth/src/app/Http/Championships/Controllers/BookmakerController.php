<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BookmakerRepository;
use App\Http\Championships\Resources\Bookmaker as BookmakerResource;
use App\Http\Championships\Resources\BookmakerCollection;

use App\Core\Controllers\ApiController;
use Illuminate\Support\Facades\Gate;
use App\Http\Championships\Models\Bookmaker;

class BookmakerController extends ApiController
{

    public function index(BookmakerRepository $countries)
    {
        if (Gate::denies('view', new Bookmaker())) {
            return $this->respondForbidden("You don't have permission");
        }
        $countries = $countries->paginate(12);
        return new BookmakerCollection($countries);
    }

    public function show(BookmakerRepository $bookmaker)
    {
        if (Gate::denies('view', Bookmaker())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new BookmakerResource($bookmaker);
    }

    public function update(BookmakerRepository $bookmaker)
    {
        if (Gate::denies('update', Bookmaker())) {
            return $this->respondForbidden("You don't have permission");
        }
        $bookmaker->update(request()->all());

        return [
            'message' => 'Bookmaker Updated Successfully',
            'entry' => $bookmaker
        ];
    }

    public function store(BookmakerRepository $bookmaker)
    {
        if (Gate::denies('create', Bookmaker())) {
            return $this->respondForbidden("You don't have permission");
        }
        $bookmaker = $bookmaker->create(request()->all());

        return [
            'message' => 'Bookmaker Created Successfully',
            'entry' => $bookmaker
        ];
    }
}

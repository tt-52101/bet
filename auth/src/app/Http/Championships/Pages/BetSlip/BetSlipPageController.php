<?php

namespace App\Http\Championships\Pages\BetSlip;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;
use App\Http\Championships\Pages\BetSlip\Views\BetConfirmView;

class BetSlipPageController extends ApiController
{
    public function betConfirm(Championship $championship)
    {
        $view = new BetConfirmView();
        return $view->get($championship);
    }
}

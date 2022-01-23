<?php

namespace App\Http\Championships\Pages\BetSlip\Components;

use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{
    Builder,
    Column,
    Component,
    Row,
};
use App\Http\Championships\Models\Championship;

class BetSlip extends Component
{

    public function schema(Championship $championship)
    {   $bet_card = new BetSlipCard();
        $bet_points = new BetSlipPoints();

        return new Row(
            children: [
                new Column(
                    children: [
                        $bet_points->schema($championship)
                    ]
                ),
                new Builder(
                    repository: new RestRepo(
                        url: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip",
                    ),
                    name: 'bet_cart',
                    children: [
                        new Column(
                            children: [
                                $bet_card->schema($championship)
                            ]
                        )
                    ]
                )
            ]
        );
    }
}

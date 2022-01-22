<?php

namespace App\Http\Championships\Pages\BetSlip\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Avatar,
    AvatarStack,
    Block,
    Builder,
    Button,
    Card,
    Column,
    Component,
    Form,
    Input,
    Progress,
    Row,
    Text
};

class BetSlip extends Component
{

    public function schema($championship = '')
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
                        url: env('APP_URL') . "/auth/api/championship/$championship/bet-slip",
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

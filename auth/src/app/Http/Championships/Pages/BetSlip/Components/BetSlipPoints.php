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

class BetSlipPoints extends Component
{

    public function schema($championship = '')
    {
        return new Form(
            repo: new RestRepo(
                show: env('APP_URL') . "/auth/api/championship/$championship/bet-slip/points"
            ),
            name: 'bet_slip_points_form',
            data: [
                'points' => 10
            ],
            children: [
                $this->card()
            ]
        );
    }

    public function card()
    {
        return new Card(
            header_left: [
                new Text('Υπόλοιπο:'),
                new Input(
                    name: 'points',
                    disabled: true
                )
            ],
            header_right: [
                new Text('Επιστροφή:'),
                new Input(
                    name: 'return',
                    disabled: true
                )
            ]
        );
    }
}

<?php

namespace App\Http\Championships\Pages\BetSlip\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Avatar,
    Button,
    Card,
    Column,
    Component,
    Form,
    Input,
    Text
};

use App\Http\Championships\Models\Championship;

class BetSlipPoints extends Component
{

    public function __construct(public $completed = false)
    {

    }

    public function schema(Championship $championship)
    {
        return new Form(
            repo: new RestRepo(
                show: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip/points",
                post: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip/finalize"
            ),
            name: 'bet_slip_points_form',
            data: $championship->points(),
            on_created: [
                new Event(
                    topic: 'route',
                    action: 'push',
                    payload: "/pages/auth/championship_play_{$championship->id}"
                )
            ],
            children: [
                $this->card($championship)
            ]
        );
    }

    public function card(Championship $championship)
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
            ],
            footer_left: [
                new Text('Ποντάρισμα:'),
                new Input(
                    name: 'bet',
                    disabled: true
                )
            ],
            footer_right: [
                $this->action($championship)
            ]
        );
    }

    function action(Championship $championship)
    {
        if ($this->completed) {
            return new Button(
                title: 'Οριστικοποίηση',
                on_click: [
                    new Event(
                        topic: 'bet_slip_points_form',
                        action: 'create',
                    )
                ]
            );
        }

        return new Button(
            title: 'Τοποθέτηση',
            on_click: [
                new Event(
                    topic: 'route',
                    action: 'push',
                    payload: "/pages/auth/championship_{$championship->id}_bet-confirm"
                )
            ]
        );
    }
}

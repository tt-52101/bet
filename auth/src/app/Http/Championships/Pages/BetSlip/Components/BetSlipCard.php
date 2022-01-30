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
use App\Http\Championships\Models\Championship;
class BetSlipCard extends Component
{

    public function schema(Championship $championship) {
        return new Form(
            name: 'bet_slip_$id',
            repo: new RestRepo(
                url: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip"
            ),
            on_deleted: [
                new Event(
                    'bet_cart',
                    action: 'get'
                ),
                new Event(
                    topic: 'bet_slip_form',
                    action: 'show',
                ),
                new Event(
                    topic: 'bet_slip_points_form',
                    action: 'show',
                ),
            ],
            on_updated: [
                new Event(
                    topic: 'bet_slip_points_form',
                    action: 'show',
                ),
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
                new Text('$value - x $odd')
            ],
            header_right: [
                new Button(
                    icon: 'feather:trash-2',
                    rounded: true,
                    on_click: [
                        new Event(
                            topic: 'bet_slip_$id',
                            action: 'delete'
                        )
                    ]
                )
            ],
            children: [
                new Block(
                    icon: [
                        new AvatarStack(
                            size: 'small',
                            items: [
                                new Avatar(
                                    picture: '$home_logo',
                                ),
                                new Avatar(
                                    picture: '$away_logo',
                                ),
                            ],
                        )
                    ],
                    title: '$home_name - $away_name',
                    subtitle: '$category'
                ),
            ],
            footer_left: [
                new Input(
                    name: 'points',
                    placeholder: 'x $odd',
                    on_change: [
                        new Event(
                            topic: 'bet_slip_$id',
                            action: 'update'
                        ),
                    ]
                ),
            ],
            footer_right: [
                new Text('Επιστροφή: '),
                new Input(
                    name: 'win',
                    disabled: true,
                ),
            ]
        );
    }
}

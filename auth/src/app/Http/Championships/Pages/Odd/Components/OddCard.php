<?php

namespace App\Http\Championships\Pages\Odd\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Text};

class OddCard
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Text('$value')
            ],
            header_right: [
                new Text('$odd')
            ],
            children: [
                new Block(
                    title: '$home_name - $away_name',
                    subtitle: '$category',
                    icon: [
                        new AvatarStack(
                            size: 'large',
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
                    action: [
                        new Button(
                            icon: 'fa fa-edit',
                            title: 'Edit',
                            rounded: true,
                            on_click: [
                                $this->editEvent()
                            ]
                        )
                    ]
                )
            ],
            footer_left: [
                new Text('$bookmaker_name')
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/odd_edit_$id'
        );
    }
}

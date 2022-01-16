<?php

namespace App\Http\Championships\Pages\Fixture\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Text};

class FixtureCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$home_name - $away_name',
                    subtitle: '$date',
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
                new Block(
                    title: '$status',
                    subtitle: '$home_goals - $away_goals'
               )
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/fixture_edit_$id'
        );
    }
}

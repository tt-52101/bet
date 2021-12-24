<?php

namespace App\Http\Championships\Pages\Fixture\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Button, Card, Text};

class FixtureCard
{

    public function schema()
    {
        return new Card(
            header_left: [
                new AvatarStack(
                    size: 'large',
                    items: [
                        new Avatar(
                            picture: '$home_logo',
                        ),
                        new Avatar(
                            picture: '$away_logo',
                        ),
                    ]
                )
            ],
            header_right: [
                new Button(
                    icon: 'fa fa-edit',
                    title: 'Edit',
                    rounded: true,
                    on_click: [
                        $this->editEvent()
                    ]
                )
            ],
            children: [
                new Text('$name')
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

<?php

namespace App\Http\Championships\Pages\Team\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class TeamCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$name',
                    subtitle: '$country',
                    icon: [
                        new Avatar(
                            picture: '$logo',
                            badge: '$league_logo',
                            size: 'xl',
                            squared: true,
                        ),
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
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/team_edit_$id'
        );
    }
}

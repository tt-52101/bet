<?php

namespace App\Http\Championships\Pages\League\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Button, Card, Text};

class LeagueCard
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Avatar(
                    picture: '$logo',
                    badge: '$country_flag'
                ),
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
            payload: '/pages/auth/league_edit_$id'
        );
    }
}

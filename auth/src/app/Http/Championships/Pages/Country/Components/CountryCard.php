<?php

namespace App\Http\Championships\Pages\Country\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Button, Card, Text};

class CountryCard
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Avatar(
                    picture: '$flag'
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
            payload: '/pages/auth/country_edit_$id'
        );
    }
}

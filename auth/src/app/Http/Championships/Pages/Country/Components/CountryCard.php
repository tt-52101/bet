<?php

namespace App\Http\Championships\Pages\Country\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class CountryCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$name',
                    subtitle: 'leagues: $leagues_count',
                    icon: [
                        new Avatar(
                            picture: '$flag',
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
            payload: '/pages/auth/country_edit_$id'
        );
    }
}

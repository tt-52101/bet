<?php

namespace App\Http\Championships\Pages\Country\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class CountryCard
{

    public $actions = [];

    public function __construct()
    {
        $this->actions = [
            new Button(
                icon: 'fa fa-edit',
                title: 'Edit',
                rounded: true,
                on_click: [
                    new Event(
                        action: 'push',
                        topic: 'route',
                        payload: '/pages/auth/country_edit_$id'
                    )
                ]
            )
        ];
    }

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
                    action: $this->action()
                )
            ]
        );
    }

    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    public function action()
    {
        return $this->actions;
    }
}

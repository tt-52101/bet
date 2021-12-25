<?php

namespace App\Http\Championships\Pages\BetCategory\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class BetCategoryCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$name',
                    icon: [
                        new Avatar(
                            initials: '$name',
                            size: 'medium',
                            color: 'primary'
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
            payload: '/pages/auth/bet-category_edit_$id'
        );
    }
}

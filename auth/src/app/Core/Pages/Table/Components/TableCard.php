<?php

namespace App\Core\Pages\Table\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Text};
use BenBodan\BetUi\Components\Component;

class TableCard extends  Component
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    icon: [
                        new Avatar(
                            initials: '$title'
                        )
                    ],
                    title: '$title',
                    subtitle: '$name',
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
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/table_edit_$id'
        );
    }
}

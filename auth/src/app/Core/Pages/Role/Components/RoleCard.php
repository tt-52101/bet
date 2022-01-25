<?php

namespace App\Core\Pages\Role\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class RoleCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$title',
                    subtitle: '$name',
                    icon: [
                        new Avatar(
                            initials: '$name',
                            size: 'medium',
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
            payload: '/pages/auth/role_edit_$id'
        );
    }
}

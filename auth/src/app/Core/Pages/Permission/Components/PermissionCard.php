<?php

namespace App\Core\Pages\Permission\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class PermissionCard
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
                            initials: '$title',
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
            payload: '/pages/auth/permission_edit_$id'
        );
    }
}

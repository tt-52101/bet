<?php

namespace App\Http\Championships\Pages\Member\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Component, Text};

class MemberCard extends Component
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Text('$championship_title')
            ],
            children: [
                new Block(
                    title: '$user_email',
                    subtitle: 'Points: $points',
                    icon: [
                        new Avatar(
                            initials: '$user_email',
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
            payload: '/pages/auth/member_edit_$id'
        );
    }
}

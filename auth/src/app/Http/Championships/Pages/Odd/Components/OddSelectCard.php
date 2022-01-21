<?php

namespace App\Http\Championships\Pages\Odd\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Component, Text};

class OddSelectCard extends Component
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$odd $value',
                    action: [
                        new Button(
                            icon: 'fa fa-edit',
                            title: 'Select',
                            rounded: true,
                            on_click: [

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
            payload: '/pages/auth/odd_edit_$id'
        );
    }
}

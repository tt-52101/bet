<?php

namespace App\Http\Championships\Pages\Odd\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Checkbox, Component, Text};

class OddSelectCard extends Component
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    subtitle: '$odd',
                    title: '$value',
                    action: [
                        new Checkbox(
                            name: 'bet_cart.query.odd_ids',
                            value: '$id',
                            on_change:  [
                                new Event(
                                    topic: 'bet_cart',
                                    action: 'get',
                                )
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

<?php

namespace App\Http\Championships\Pages\Odd\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Form, Block, Button, Card, Checkbox, Component, Text};
use BenBodan\BetUi\Repositories\RestRepo;

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
                            name: 'bet_slip_form.body.odd_ids',
                            value: '$id',
                            on_change:  [
                                new Event(
                                    topic: 'bet_slip_form',
                                    action: 'create',
                                ),
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

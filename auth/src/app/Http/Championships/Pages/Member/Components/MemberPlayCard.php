<?php

namespace App\Http\Championships\Pages\Member\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Component, Progress, Text};

class MemberPlayCard extends Component
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Text('$championship_title')
            ],
            children: [
                new Block(
                    title: '$championship_title',
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
                            title: 'Play',
                            rounded: true,
                            on_click: [
                                $this->editEvent()
                            ]
                        )
                    ]
                ),
                new Progress(
                    title: 'Win Percentage',
                    name: 'win_percentage'
                )
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/championship_play_$championship_id'
        );
    }
}

<?php

namespace App\Http\Championships\Pages\Season\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Text};

class SeasonCard
{

    public function schema()
    {
        return new Card(
            children: [
                new Block(
                    title: '$league_name',
                    subtitle: '$year',
                    icon: [
                        new Avatar(
                            picture: '$league_logo',
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
                    ],
                )
            ],
            footer_left: [
                new Text('$start - $end')
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/season_edit_$id'
        );
    }
}

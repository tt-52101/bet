<?php

namespace App\Http\Championships\Pages\Bet\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, AvatarStack, Block, Button, Card, Text};

class BetCard
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Text('$championship_title')
            ],
            header_right: [
                new Text('$value')
            ],
            children: [
                new Block(
                    title: '$home_name - $away_name',
                    subtitle: '$category',
                    icon: [
                        new AvatarStack(
                            items: [
                                new Avatar(
                                    picture: '$home_logo',
                                ),
                                new Avatar(
                                    picture: '$away_logo',
                                ),
                            ],
                        )
                    ],
                    action: [

                    ]
                )
            ],
            footer_left: [
                new Text('Ποντάρισμα: $points'),
            ],
            footer_right: [
                new Text('Επιστροφή: $return')
            ]
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/bet_edit_$id'
        );
    }
}

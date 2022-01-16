<?php

namespace App\Http\Championships\Pages\Championship\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Block, Button, Card, Gauge, Progress, Text};
use BenBodan\BetUi\Components\Component;

class ChampionshipStatsCard extends Component
{

    public function schema()
    {
        return new Card(
            header_left: [
                new Text('$title')
            ],
            children: [
                new Progress(
                    title: 'Win Percentage',
                    name: 'win_percentage',
                ),
                new Block(
                    title: 'Period',
                    subtitle: '$start_at - $end_at',
                    action: [
                        new Button(
                            title: 'Play',
                            on_click: [
                                new Event(
                                    action: 'push',
                                    topic: 'route',
                                    payload: '/pages/auth/championship_play_$id'
                                )
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
            payload: '/pages/auth/championship_edit_$id'
        );
    }
}

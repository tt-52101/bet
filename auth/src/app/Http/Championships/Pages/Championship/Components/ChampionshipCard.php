<?php

namespace App\Http\Championships\Pages\Championship\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Block, Button, Card, Component, Progress, Text};

class ChampionshipCard extends Component {

    public function schema(){
        return new Card(
            header_right: [
                new Button(
                    icon: 'fa fa-edit',
                    title: 'Edit',
                    rounded: true,
                    on_click: [
                        $this->editEvent()
                    ]
                )
            ],
            header_left: [
                new Text('$title')
            ],
            children: [
                new Block(
                    title: 'Period',
                    subtitle: '$start_at - $end_at',
                    action: [
                        new Button(
                            title: 'Join',
                            on_click: [
                                $this->joinEvent()
                            ]
                        )
                    ]
                )
            ],
        );
    }

    public function editEvent(){
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/championship_edit_$id'
        );
    }


    public function joinEvent(){
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/championship_join_$id'
        );
    }
}

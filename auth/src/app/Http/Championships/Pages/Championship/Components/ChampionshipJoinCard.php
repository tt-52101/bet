<?php

namespace App\Http\Championships\Pages\Championship\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Card, Component, Progress, Text};

class ChampionshipJoinCard extends Component {

    public function schema(){
        return new Card(
            header_left: [
                new Text('$title')
            ],
            children: [
                new Block(
                    icon: [
                        new Avatar(
                            initials: '$title'
                        )
                    ],
                    action: [
                        new Button(
                            title: 'Join',
                            rounded: true,
                            on_click: [
                                 $this->joinEvent()
                            ]
                        )
                    ],
                    title: '$title',
                ),
            ],
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

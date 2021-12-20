<?php

namespace App\Http\Championships\Pages\Championship\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Button, Card, Text};

class ChampionshipCard {

    public function schema(){
        return new Card(
            header_left: [
                new Text('$title')
            ],
            header_right: [
                new Button(
                    icon: 'fa fa-edit',
                    title: 'Edit',
                    rounded: true,
                    on_click: [
                        $this->editEvent()
                    ]
                )
            ]
        );
    }

    public function editEvent(){
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/championship_edit_$id'
        );
    }
}

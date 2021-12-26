<?php

namespace App\Http\Championships\Pages\Championship\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Avatar, Form, Block, Button, Card};
use BenBodan\BetUi\Components\Component;
use BenBodan\BetUi\Repositories\RestRepo;

class ChampionshipLeagueCard extends Component
{

    public $actions = [];
    public $form_url = '';
    public function __construct($form_url)
    {
        $this->form_url = $form_url;
        $this->actions = [
            new Button(
                title: 'Remove',
                icon: 'fa fa-trash',
                on_click: [
                    new Event(
                        topic: 'championship_league_form_$id',
                        action: 'delete'
                    )
                ]
            )
        ];
    }


    public function schema()
    {
        return new Form(
            name: 'championship_league_form_$id',
            repo: new RestRepo(
                url: $this->form_url,
            ),
            on_deleted: [
                new Event(
                    action: 'get',
                    topic: 'paginated_leagues'
                )
            ],
            children: [
                new Card(
                    children: [
                        new Block(
                            title: '$name',
                            subtitle: '$country',
                            icon: [
                                new Avatar(
                                    picture: '$logo',
                                    badge: '$country_flag',
                                    size: 'xl',
                                    squared: true
                                ),
                            ],
                            action: $this->actions
                        )
                    ]
                )
            ]
        );
    }

    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/league_edit_$id'
        );
    }
}

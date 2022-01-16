<?php

namespace App\Http\Championships\Pages\Championship\Views;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Block,
    Button,
    ButtonGroup,
    Form,
    Radio,
    View,
    Card,
    Modal,
    Page,
    Row,
    Column,
    Text,
    Builder};
use BenBodan\BetUi\Repositories\RestRepo;

class ChampionshipJoinView
{

    public function __construct(
    )
    {

    }

    public function schema($data = [])
    {
        $id = $data['id'];
        return new Row(
            children: [
                new Column(
                    children: [
                        new Form(
                            repo: new RestRepo(
                                url: env('APP_URL') . '/auth/api/championship/$id/join'
                            ),
                            name: 'join_championship',
                            data: $data,
                            on_created: [
                                new Event(
                                    topic: 'route',
                                    action: 'push',
                                    payload: '/pages/auth/profile'
                                )
                            ],
                            children: [
                                new Card(
                                    children: [
                                        new Text('$title'),
                                        new Text('$description')
                                    ],
                                    footer_right: [
                                        new ButtonGroup(
                                            children: [
                                                new Button(
                                                    title: 'Back',
                                                    on_click: [
                                                        new Event(
                                                            topic: 'route',
                                                            action: 'back'
                                                        )
                                                    ]
                                                ),
                                                new Button(
                                                    title: 'Accept',
                                                    on_click: [
                                                        new Event(
                                                            topic: 'join_championship',
                                                            action: 'create'
                                                        )
                                                    ]
                                                ),
                                            ]
                                        ),
                                    ]
                                )
                            ]
                        ),
                    ]
                )
            ]
        );
    }

    public function get($data = [])
    {
        $page = new Page(
            children: [
                $this->schema($data)
            ]
        );
        return $page();
    }
}

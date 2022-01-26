<?php

namespace App\Http\Championships\Pages\League\Views;

use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
use App\Http\Championships\Pages\League\Components\LeagueForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Datepicker, Form, Page, Row, Column, Builder};
use BenBodan\BetUi\Repositories\RestRepo;
use Carbon\Carbon;
use BenBodan\BetUi\Events\Event;

class LeagueEditView
{

    public function __construct(
        public LeagueForm $form,
        public FixtureIndexView $fixtures
    )
    {

    }

    public function schema($data = [])
    {
        $this->fixtures->column_size = 12;
        if($data) {
            $this->fixtures->filters = [
              'per_page' => 3,
              'league_id' => $data['id']
            ];
        }

        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
                        $this->form->schema($data)
                    ]
                ),
                new Column(
                    desktop: 6,
                    children: [
                        $this->fixtures($data),
                        new Accordion(
                            items: [
                                new AccordionItem(
                                    title: 'Fixtures',
                                    children: [
                                         $this->fixtures->schema()
                                    ]
                                ),
                            ]
                        )
                    ]
                ),
            ]
        );
    }

    public function fixtures($data = []){
        $league_id = $data['id'];
        return new Card(
            header_right: [
                new Button(
                    title: 'Sync Fixtures',
                    rounded: true,
                    on_click: [
                        new Event(
                            topic: 'league_sync_form',
                            action: 'create'
                        )
                    ]
                ),
            ],
            children: [
                new Form(
                    name: 'league_sync_form',
                    repo: new RestRepo(
                        url: env('APP_URL') . "/auth/api/league/{$league_id}/sync",
                    ),
                    data: [
                        'from' => Carbon::now(),
                        'to' => Carbon::now()->addDays(7),
                    ],
                    children: [
                        new Row(
                            children: [
                                new Column(
                                    desktop: 6,
                                    children: [
                                        new Datepicker(
                                            title: 'From',
                                            name: 'from'
                                        )
                                    ]
                                ),
                                new Column(
                                    desktop: 6,
                                    children: [
                                        new Datepicker(
                                            title: 'To',
                                            name: 'to'
                                        )
                                    ]
                                )
                            ]
                        )
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

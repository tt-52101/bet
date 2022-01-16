<?php

namespace App\Http\Championships\Pages\Championship\Views;

use App\Http\Championships\Pages\Championship\Components\ChampionshipLeagueCard;
use App\Http\Championships\Pages\Championship\Components\ChampionshipForm;
use App\Http\Championships\Pages\League\Views\LeagueIndexView;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Radio, View, Card, Modal, Page, Row, Column, Builder};

class ChampionshipEditView
{

    public function __construct(
        public ChampionshipForm $form,
    )
    {

    }

    public function schema($data = [])
    {
        $id = $data['id'];
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
                        new Accordion(
                            active: 0,
                            items: [
                                new AccordionItem(
                                    title: 'Football',
                                    children: [
                                        $this->leagueModal($id),
                                        $this->leagues($id),
                                    ]
                                )
                            ]
                        )
                    ]
                ),
            ]
        );
    }

    public function leagues($championship_id)
    {
        $url = env('APP_URL')."/auth/api/championship/$championship_id/league";
        $card = new ChampionshipLeagueCard($url);

        $leagues = new LeagueIndexView($card);
        $leagues->column_size = 12;
        $leagues->filters = [
            'per_page' => 3,
            'championship_id' => $championship_id
        ];
        return $leagues->schema();
    }

    public function leagueModal($championship_id)
    {
        return new Row(
            children: [
                new Button(
                    align: 'right',
                    title: 'Add New',
                    on_click: [
                        new Event(
                            action: 'show',
                            topic: 'league_modal'
                        ),
                    ]
                ),
                new Modal(
                    name: 'league_modal',
                    children: [
                        new View(
                            name: 'add_league.body',
                            topic: 'add_league_view',
                            repo: new RestRepo(
                                url: env('APP_URL') . "/auth/api/page/championship/$championship_id/wizard/league",
                            )
                        )
                    ],
                    footer: [
                        new Button(
                            title: 'Next',
                            on_click: [
                                new Event(
                                    topic: 'add_league_view',
                                    action: 'get'
                                )
                            ]
                        ),
                        new Button(
                            title: 'Select',
                            on_click: [
                                new Event(
                                    topic: 'add_league',
                                    action: 'create'
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

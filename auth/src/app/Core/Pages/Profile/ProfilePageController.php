<?php

namespace App\Core\Pages\Profile;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Pages\Championship\Components\ChampionshipStatsCard;
use App\Http\Championships\Pages\Championship\Components\ChampionshipCard;
use App\Http\Championships\Pages\Championship\Views\ChampionshipIndexView;
use App\Http\Championships\Pages\Fixture\Components\FixtureCard;
use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
use BenBodan\BetUi\Components\{Avatar, Block, Button, Gauge, Row, Column, Card, Page, Tab, Tabs};
use Illuminate\Support\Facades\Auth;

class ProfilePageController extends ApiController
{

    public function page()
    {
        $user = Auth::user()->id;

        $my_championship = new ChampionshipStatsCard();
        $my_championships = new ChampionshipIndexView($my_championship);
        $my_championships->filters = [
            'user_id' => $user
        ];

        $championship = new ChampionshipCard();
        $championships = new ChampionshipIndexView($championship);
        $championships->filters = [
            'not_user_id' => $user
        ];

        $fixture = new FixtureCard();
        $fixtures = new FixtureIndexView($fixture);
        $fixtures->column_size = 12;
        $fixtures->filters= [
            'per_page' => 2,
        ];

        $page = new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            desktop: 8,
                            children: [
                                new Tabs(
                                    active: 'my_championships',
                                    type: 'boxed',
                                    tabs: [
                                        new Tab(
                                            icon: 'feather:calendar',
                                            label: 'My Championships',
                                            value: 'my_championships',
                                            children: [
                                                $my_championships->schema()
                                            ]
                                        ),
                                        new Tab(
                                            icon: 'feather:calendar',
                                            label: 'Championships',
                                            value: 'championships',
                                            children: [
                                                $championships->schema()
                                            ]
                                        ),
                                        new Tab(
                                            icon: 'feather:activity',
                                            label: 'History',
                                            value: 'history',
                                            children: [
                                                $fixtures->schema()
                                            ]
                                        ),
                                    ]
                                ),
                            ]
                        ),
                        new Column(
                            desktop: 4,
                            children: [
                                new Card(
                                    children: [
                                        new Block(
                                            icon: [
                                                new Avatar(
                                                    picture: "https://vuero.cssninja.io/demo/avatars/5.jpg",
                                                    size: 'xl',
                                                    badge: ''
                                                )
                                            ],
                                            title: 'Username',
                                            subtitle: 'ben.bodan@gmail.com',
                                            action: [
                                                new Button(
                                                    title: 'Edit'
                                                )
                                            ]
                                        )
                                    ],
                                    header_left: [

                                    ]
                                ),
                                new Card(
                                    children: [
                                        new Gauge(
                                            height: 200,
                                            value: 20,
                                            legend: 'Completed',
                                            show_legend: false,
                                        )
                                    ]
                                )
                            ]
                        )
                    ]
                )
            ]
        );

        return $page();
    }
}

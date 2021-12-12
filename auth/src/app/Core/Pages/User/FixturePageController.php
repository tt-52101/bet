<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{Builder,
    ButtonGroup,
    Input,
    Modal,
    Page,
    Flex,
    FlexItem,
    Card,
    Row,
    Column,
    Button,
    Avatar,
    DropDown,
    DropDownItem,
    Pagination,
    Form,
    Selectable,
    Table,
    TableColumn,
    TableRow,
    View,
    Text
};
use BenBodan\BetUi\Repositories\{RestRepo, StateRepo};
use BenBodan\BetUi\Events\Event;
use App\Models\Fixture;
use App\Core\Resources\Fixture as FixtureResource;

class FixturePageController extends ApiController
{


    public function page()
    {
        $page = new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            children: [
                                new Input(
                                    placeholder: 'Search',
                                    focus: 'primary',
                                    name: 'fixtures.query.keyword',
                                    icon: 'fa fa-search',
                                    help: 'Search using keywords',
                                    on_enter: [
                                        new Event(
                                            topic: 'fixtures',
                                            action: 'search',
                                        )
                                    ],
                                    addons: [
                                        new ButtonGroup(
                                            children: [
                                                new Button(
                                                    icon: 'fa fa-search',
                                                    type: 'primary',
                                                    on_click: [
                                                        new Event(
                                                            topic: 'fixtures',
                                                            action: 'search',
                                                        )
                                                    ]
                                                ),
                                                new Button(
                                                    icon: 'fa fa-redo',
                                                    type: 'primary',
                                                    on_click: [
                                                        new Event(
                                                            topic: 'fixtures',
                                                            action: 'clear',
                                                        )
                                                    ]
                                                )
                                            ]
                                        )
                                    ]
                                )
                            ]
                        ),
                        new Column(
                            children: [
                                new Pagination(
                                    name: 'fixtures.meta',
                                    on_change: [
                                        new Event(
                                            topic: 'fixtures',
                                            action: 'get',
                                        )
                                    ]
                                )
                            ]
                        ),
                        new Column(
                            children: [
                                new Table(
                                    columns: [
                                        new TableColumn(
                                            title: 'Home'
                                        ),
                                        new TableColumn(
                                            title: 'Away'
                                        ),
                                        new TableColumn(
                                            title: 'Odds',
                                            end: true
                                        )
                                    ],
                                    children: [
                                        new Builder(
                                            name: 'fixtures',
                                            repository: new RestRepo('http://localhost/auth/api/fixture'),
                                            children: [
                                                new TableRow(
                                                    columns: [
                                                        new TableColumn(
                                                            title: 'Home',
                                                            children: [
                                                                new Avatar(
                                                                    picture: '$home_logo'
                                                                ),
                                                                new Avatar(
                                                                    picture: '$away_logo'
                                                                ),
                                                            ]
                                                        ),
                                                        new TableColumn(
                                                            title: 'Title',
                                                            children: [
                                                                new Text('$home_team - $away_team'),
                                                            ]
                                                        ),
                                                        new TableColumn(
                                                            title: 'Title',
                                                            children: [
                                                                new Text('$date'),
                                                            ]
                                                        ),
                                                        new TableColumn(
                                                            title: 'Title',
                                                            children: [
                                                                new Selectable(
                                                                    name: 'select',
                                                                    label: 'title',
                                                                    subtitle: 'subtitle',
                                                                    identifier: 'id',
                                                                    options: [
                                                                        [
                                                                            'id' => '$fixture_id_home',
                                                                            'title' => '1',
                                                                            'subtitle' => '$home'
                                                                        ],
                                                                        [
                                                                            'id' => '$fixture_id_draw',
                                                                            'title' => 'x',
                                                                            'subtitle' => '$draw'
                                                                        ],
                                                                        [
                                                                            'id' => '$fixture_id_away',
                                                                            'title' => '2',
                                                                            'subtitle' => '$away'
                                                                        ],
                                                                    ]
                                                                )
                                                            ]
                                                        ),
                                                    ]
                                                )
                                            ]
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

<?php

namespace App\Http\Championships\Pages\Championship\Views;

use App\Http\Championships\Models\Championship;
use App\Http\Championships\Pages\BetSlip\Components\BetSlip;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Avatar,
    AvatarStack,
    Block,
    BreadCrumb,
    BreadCrumbItem,
    Button,
    ButtonGroup,
    Form,
    Input,
    Pagination,
    Radio,
    Selectable,
    Table,
    TableColumn,
    TableRow,
    View,
    Card,
    Modal,
    Page,
    Row,
    Column,
    Text,
    Builder};
use BenBodan\BetUi\Repositories\RestRepo;

class ChampionshipPlayView
{

    public function __construct()
    {

    }

    public function schema(Championship $championship)
    {
        $bet_slip = new BetSlip();

        return new Row(
            children: [
                new Column(
                    children: [
                        new BreadCrumb(
                            items: [
                                new BreadCrumbItem(
                                    label: 'Profile',
                                    icon: 'feather:user',
                                    link: '/pages/auth/profile'
                                ),
                                new BreadCrumbItem(
                                    label: $championship->title,
                                )
                            ]
                        ),
                    ]
                ),
                new Column(
                    desktop: 8,
                    children: [
                        new Pagination(
                            name: "paginated_fixtures.meta",
                            on_change: [
                                new Event(
                                    topic: 'paginated_fixtures',
                                    action: 'get',
                                )
                            ]
                        ),
                        new Table(
                            columns: [
                                new TableColumn(
                                    title: 'Match',
                                ),
                                new TableColumn(
                                    title: 'Odds',
                                    end: true
                                ),
                                new TableColumn(
                                    title: 'Match',
                                    end: true
                                ),
                            ],
                            children: [
                                new Builder(
                                    name:'paginated_fixtures',
                                    repository: new RestRepo(
                                        url: env('APP_URL') . "/auth/api/championship/{$championship->id}/fixtures",
                                        filters: [
                                            'has_odds' => true,
                                            'playable' => true
                                        ]
                                    ),
                                    children: [
                                        new TableRow(
                                            columns: [
                                                new TableColumn(
                                                    title: 'Match',
                                                    children: [
                                                        new Block(
                                                            icon: [
                                                                new AvatarStack(
                                                                    items: [
                                                                        new Avatar(
                                                                            picture: '$home_logo'
                                                                        ),
                                                                        new Avatar(
                                                                            picture: '$away_logo'
                                                                        ),
                                                                    ]
                                                                )
                                                            ],
                                                            title: '$home_name - $away_name',
                                                            subtitle: '$date - $status'
                                                        ),
                                                    ]
                                                ),
                                                new TableColumn(
                                                    title: 'Title',
                                                    end: true,
                                                    children: [
                                                        new Button(
                                                            title: 'More',
                                                            on_click: [
                                                                new Event(
                                                                    'route',
                                                                    action: 'push',
                                                                    payload: "/pages/auth/championship_{$championship->id}_fixture_" . '$id'
                                                                ),
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
                ),
                new Column(
                    desktop: 4,
                    children: [
                        $bet_slip->schema($championship)
                    ]
                )
            ]
        );
    }


    public function get(Championship $championship)
    {
        $page = new Page(
            children: [
                $this->schema($championship)
            ]
        );
        return $page();
    }
}

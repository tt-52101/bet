<?php

namespace App\Http\Championships\Pages\Championship\Views;

use App\Http\Championships\Pages\BetSlip\Components\BetSlip;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Avatar,
    AvatarStack,
    Block,
    Button,
    ButtonGroup,
    Form,
    Input,
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
    Builder
};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Repositories\StateRepo;

class ChampionshipPlayView
{

    public function __construct()
    {

    }

    public function schema($data = [])
    {
        $id = $data['id'];
        $bet_slip = new BetSlip();

        return new Row(
            children: [
                new Column(
                    desktop: 8,
                    children: [
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
                                    repository: new RestRepo(
                                        url: env('APP_URL') . "/auth/api/championship/$id/fixtures",
                                        filters: [
                                            'has_odds' => true
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
                                                            subtitle: '$date'
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
                                                                    payload: "/pages/auth/championship_${id}_fixture_" . '$id'
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
                        $bet_slip->schema($id)
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

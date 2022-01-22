<?php

namespace App\Http\Championships\Pages\Fixture\Views;

use App\Http\Championships\Models\Odd;
use App\Http\Championships\Pages\Fixture\Components\FixtureForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Form, Input, Text, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Components\OddSelectCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use Hamcrest\Core\Every;

class FixtureOddsView
{

    public function __construct()
    {

    }


    public function odds($data, $category_id, $championship = '')
    {
        $card = new OddSelectCard();
        $odds = new OddIndexView($card);
        $odds->column_size = 6;
        $odds->filters = [
            'bet_category_id' => $category_id,
            'bookmaker_id' => 5,
            'fixture_id' => $data['id']
        ];

        return $odds;
    }

    public function schema($data = [], string $championship = '')
    {

        $match_winner = $this->odds($data, 1, $championship);
        $over_under = $this->odds($data, 5, $championship);
        $exact_score = $this->odds($data, 10, $championship);

        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
                        new Form(
                            name: 'bet_slip_form',
                            repo: new RestRepo(
                                url: env('APP_URL') . "/auth/api/championship/$championship/bet-slip",
                            ),
                            on_created: [
                                new Event(
                                    topic: 'bet_cart',
                                    action: 'get',
                                ),

                            ]
                        ),
                        new Accordion(
                            items: [
                                new AccordionItem(
                                    title: 'Τελικό Αποτέλεσμα',
                                    children: [
                                        $match_winner->schema()
                                    ]
                                ),
                                new AccordionItem(
                                    title: 'Γκολ Over/Under',
                                    children: [
                                        $over_under->schema()
                                    ]
                                ),
                                new AccordionItem(
                                    title: 'Ακριβές Σκορ',
                                    children: [
                                        $exact_score->schema()
                                    ]
                                )
                            ]
                        )
                    ]
                ),
                new Column(
                    desktop: 3,
                    children: [
                        new Row(
                            children: [
                                new Builder(
                                    repository: new RestRepo(
                                        url: env('APP_URL') . "/auth/api/championship/$championship/bet-slip",
                                    ),
                                    name: 'bet_cart',
                                    children: [
                                        new Column(
                                            children: [
                                                new Form(
                                                    repo: new RestRepo(
                                                        url: env('APP_URL') . "/auth/api/championship/$championship/bet-slip"
                                                    ),
                                                    name: 'bet_slip_$id',
                                                    children: [
                                                        new Card(
                                                            header_left: [
                                                                new Text('$category')
                                                            ],
                                                            header_right: [
                                                                new Text('$value')
                                                            ],
                                                            children: [
                                                                new Input(
                                                                    name: 'points',
                                                                    on_change: [
                                                                        new Event(
                                                                            topic: 'bet_slip_$id',
                                                                            action: 'update'
                                                                        )
                                                                    ]
                                                                )
                                                            ]
                                                        )
                                                    ]
                                                ),
                                            ]
                                        )
                                    ]
                                )
                            ]
                        ),
                    ]
                )
            ]
        );
    }


    public function get($data = [], $championship = '')
    {
        $page = new Page(
            children: [
                $this->schema($data, $championship)
            ]
        );
        return $page();
    }
}

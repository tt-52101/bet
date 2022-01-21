<?php

namespace App\Http\Championships\Pages\Fixture\Views;

use App\Http\Championships\Models\Odd;
use App\Http\Championships\Pages\Fixture\Components\FixtureForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Components\OddSelectCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class FixtureOddsView
{

    public function __construct(
    )
    {

    }


    public function odds($data, $category_id){
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

    public function schema($data = [])
    {
        $match_winner = $this->odds($data, 1);
        $over_under = $this->odds($data, 5);;
        $exact_score = $this->odds($data, 10);

        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
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

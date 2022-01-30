<?php

namespace App\Http\Championships\Pages\Fixture\Views;

use App\Http\Championships\Pages\Bet\Components\BetCard;
use App\Http\Championships\Pages\Bet\Views\BetIndexView;
use App\Http\Championships\Pages\Fixture\Components\FixtureForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class FixtureEditView
{

    public function __construct(
        public FixtureForm  $form,
    )
    {

    }

    public function schema($data = [])
    {
        $odd_card = new OddCard();
        $odds = new OddIndexView($odd_card);

        $odds->column_size = 12;
        $odds->filters = [
            'fixture_id' => $data['id'],
            'per_page' => 3
        ];

        $bet_card = new BetCard();
        $bets = new BetIndexView($bet_card);
        $bets->column_size = 12;
        $bets->filters = [
            'fixture_id' => $data['id'],
            'per_page' => 3
        ];

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
                            items: [
                                new AccordionItem(
                                    title: 'Odds',
                                    children: [
                                        $odds->schema()
                                    ]
                                ),
                            ]
                        ),
                        new Accordion(
                            items: [
                                new AccordionItem(
                                    title: 'Bets',
                                    children: [
                                        $bets->schema()
                                    ]
                                ),
                            ]
                        )
                    ]
                ),
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

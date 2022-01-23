<?php

namespace App\Http\Championships\Pages\Bet\Views;

use App\Http\Championships\Pages\Bet\Components\BetForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class BetEditView
{

    public function __construct(
        public BetForm $form,
    )
    {

    }

    public function schema($data = [])
    {

        $odd_card = new OddCard();
        $odds = new OddIndexView($odd_card);

        if ($data) {
            $odds->column_size = 12;
            $odds->filters = [
                'bet_id' => $data['id'],
                'per_page' => 3
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
                        new Accordion(
                            items: [
                                new AccordionItem(
                                    title: 'Odds',
                                    children: [
                                        $odds->schema()
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

<?php

namespace App\Http\Championships\Pages\Bookmaker\Views;

use App\Http\Championships\Pages\Bookmaker\Components\BookmakerForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class BookmakerEditView
{

    public function __construct(
        public BookmakerForm $form,
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
                'bookmaker_id' => $data['id'],
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

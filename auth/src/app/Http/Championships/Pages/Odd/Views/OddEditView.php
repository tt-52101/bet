<?php

namespace App\Http\Championships\Pages\Odd\Views;

use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Components\OddForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;

class OddEditView
{

    public function __construct(
        public OddForm          $form,
        public FixtureIndexView $fixtures,
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
                'per_page' => 3,
                'bet_category_id' => $data['bet_category_id'],
                'fixture_id' => $data['fixture_id'],
                'value' => $data['value'],
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
                                    title: 'Other Bookmakers',
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

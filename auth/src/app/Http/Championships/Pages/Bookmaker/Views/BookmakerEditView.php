<?php

namespace App\Http\Championships\Pages\Bookmaker\Views;

use App\Http\Championships\Pages\Bookmaker\Components\BookmakerForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
class BookmakerEditView
{

    public function __construct(
        public BookmakerForm $form,
        public FixtureIndexView $fixtures,
    )
    {

    }

    public function schema($data = [])
    {
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
                                        $this->fixtures->schema()
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

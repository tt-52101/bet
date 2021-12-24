<?php

namespace App\Http\Championships\Pages\League\Views;

use App\Http\Championships\Pages\League\Components\LeagueForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};

class LeagueEditView
{

    public function __construct(
        public LeagueForm $form,
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
                                    title: 'Football',
                                    children: [
                                        new Button('Add')
                                    ]
                                ),
                                new AccordionItem(
                                    title: 'Bascketball'
                                )
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

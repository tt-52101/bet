<?php

namespace App\Http\Championships\Pages\Country\Views;

use App\Http\Championships\Pages\Country\Components\CountryForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};

class CountryEditView
{

    public function __construct(
        public CountryForm $form,
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

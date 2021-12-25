<?php

namespace App\Http\Championships\Pages\Team\Views;

use App\Http\Championships\Pages\Team\Components\TeamForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
class TeamEditView
{

    public function __construct(
        public TeamForm $form,
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
                                    title: 'Fixtures',
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

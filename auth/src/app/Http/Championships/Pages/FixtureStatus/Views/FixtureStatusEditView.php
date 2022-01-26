<?php

namespace App\Http\Championships\Pages\FixtureStatus\Views;

use App\Http\Championships\Pages\FixtureStatus\Components\FixtureStatusForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class FixtureStatusEditView
{

    public function __construct(
        public FixtureStatusForm $form,
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

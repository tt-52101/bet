<?php

namespace App\Http\Championships\Pages\Championship\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Championship\Components\ChampionshipForm;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};

class ChampionshipEditView
{

    public function __construct(
        public ChampionshipForm $form,
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

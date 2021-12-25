<?php

namespace App\Http\Championships\Pages\League\Views;

use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
use App\Http\Championships\Pages\League\Components\LeagueForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};

class LeagueEditView
{

    public function __construct(
        public LeagueForm $form,
        public FixtureIndexView $fixtures
    )
    {

    }

    public function schema($data = [])
    {
        $this->fixtures->column_size = 12;

        if($data) {
            $this->fixtures->filters = [
              'per_page' => 3,
              'league_id' => $data['id']
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

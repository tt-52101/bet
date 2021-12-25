<?php

namespace App\Http\Championships\Pages\Country\Views;

use App\Http\Championships\Pages\Country\Components\CountryForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\League\Views\LeagueIndexView;

class CountryEditView
{

    public function __construct(
        public CountryForm     $form,
        public LeagueIndexView $leagues,
    )
    {

    }

    public function schema($data = [])
    {
        if ($data) {
            $this->leagues->column_size = 12;
            $this->leagues->filters = [
              'per_page' => 3,
              'country_id' => $data['id']
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
                                    title: 'Leagues',
                                    children: [
                                       $this->leagues->schema()
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

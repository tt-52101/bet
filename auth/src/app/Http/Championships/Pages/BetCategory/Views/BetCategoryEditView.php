<?php

namespace App\Http\Championships\Pages\BetCategory\Views;

use App\Http\Championships\Pages\BetCategory\Components\BetCategoryForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class BetCategoryEditView
{

    public function __construct(
        public BetCategoryForm $form,
        public OddIndexView $odds,
    )
    {

    }

    public function schema($data = [])
    {
        if($data){
            $this->odds->column_size = 12;
            $this->odds->filters = [
                'per_page' => 3,
                'bet_category_id' => $data['id']
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
                                        $this->odds->schema()
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

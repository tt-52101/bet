<?php

namespace App\Core\Pages\Table\Views;

use App\Core\Pages\Table\Components\TableForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder, Tab};

class TableEditView
{

    public function __construct(
    )
    {

    }

    public function schema($data = [])
    {
        $form = new TableForm();

        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
                        $form->schema($data)
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

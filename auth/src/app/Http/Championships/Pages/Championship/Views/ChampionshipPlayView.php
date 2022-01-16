<?php

namespace App\Http\Championships\Pages\Championship\Views;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Block,
    Button,
    ButtonGroup,
    Form,
    Radio,
    View,
    Card,
    Modal,
    Page,
    Row,
    Column,
    Text,
    Builder};
use BenBodan\BetUi\Repositories\RestRepo;

class ChampionshipPlayView
{

    public function __construct(
    )
    {

    }

    public function schema($data = [])
    {
        $id = $data['id'];
        return new Row(
            children: [
                new Column(
                    children: [

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

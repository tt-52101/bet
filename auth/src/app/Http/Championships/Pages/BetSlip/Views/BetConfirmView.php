<?php

namespace App\Http\Championships\Pages\BetSlip\Views;

use App\Http\Championships\Pages\BetSlip\Components\BetSlipCard;
use App\Http\Championships\Pages\Fixture\Components\FixtureForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Views\OddIndexView;
use App\Http\Championships\Models\Championship;

class BetConfirmView
{

    public function schema(Championship $championship)
    {
        $bet_card = new BetSlipCard();
        $bet_slip = new BetSlipIndexView($bet_card);
        return new Row(
            children: [
                new Column(
                    desktop: 12,
                    children: [
                        $bet_slip->schema($championship)
                    ]
                )
            ]
        );
    }


    public function get(Championship $championship)
    {
        $page = new Page(
            children: [
                $this->schema($championship)
            ]
        );
        return $page();
    }
}

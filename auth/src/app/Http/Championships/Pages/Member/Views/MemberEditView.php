<?php

namespace App\Http\Championships\Pages\Member\Views;

use App\Http\Championships\Pages\Bet\Components\BetCard;
use App\Http\Championships\Pages\Bet\Views\BetIndexView;
use App\Http\Championships\Pages\Member\Components\MemberForm;
use BenBodan\BetUi\Components\{Accordion, AccordionItem, Button, Card, Page, Row, Column, Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;

class MemberEditView
{

    public function __construct(
        public MemberForm $form,
    )
    {

    }

    public function schema($data = [])
    {

        $bet_card = new BetCard();
        $bets = new BetIndexView($bet_card);

        if ($data) {
            $bets->column_size = 12;
            $bets->filters = [
                'user_id' => $data['id'],
                'per_page' => 3
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
                                    title: 'Member Bets',
                                    children: [
                                        $bets->schema()
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

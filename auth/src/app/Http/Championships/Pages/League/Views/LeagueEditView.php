<?php

namespace App\Http\Championships\Pages\League\Views;

use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
use App\Http\Championships\Pages\League\Components\LeagueFixtureSyncForm;
use App\Http\Championships\Pages\League\Components\LeagueForm;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Button,
    Card,
    Datepicker,
    Form,
    Page,
    Row,
    Column,
    Builder,
    Tab,
    Tabs
};
use App\Http\Championships\Pages\League\Components\LeagueOddSyncForm;
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;
use BenBodan\BetUi\Repositories\RestRepo;
use Carbon\Carbon;
use BenBodan\BetUi\Events\Event;

class LeagueEditView
{

    public function __construct(
        public LeagueForm       $form,
        public FixtureIndexView $fixtures
    )
    {

    }

    public function schema($data = [])
    {

        $this->fixtures->column_size = 12;
        if ($data) {
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
                        new Tabs(
                            active: 'fixtures',
                            tabs: [
                                new Tab(
                                    label: 'Sync Fixtures',
                                    value: 'fixtures',
                                    children: $this->fixtures($data)
                                ),
                                new Tab(
                                    label: 'Sync Odds',
                                    value: 'odds',
                                    children: $this->odds($data)
                                )
                            ]
                        ),

                    ]
                ),
            ]
        );
    }

    public function fixtures($data = [])
    {
        $fixtureSyncForm = new LeagueFixtureSyncForm();

        return [
            $fixtureSyncForm->schema($data),
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
        ];
    }

    public function odds($data = [])
    {
        $form = new LeagueOddSyncForm();
        $odd_card = new OddCard();
        $odds = new OddIndexView($odd_card);
        $odds->column_size = 12;
        $odds->filters = [
            'per_page' => 4,
            'league_id' => $data['id']
        ];

        return [
            $form->schema($data),
            new Accordion(
                items: [
                    new AccordionItem(
                        title: 'Odds',
                        children: [
                            $odds->schema()
                        ]
                    ),
                ]
            )
        ];
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

<?php

namespace App\Http\Championships\Pages\Fixture\Views;

use App\Http\Championships\Models\Championship;
use App\Http\Championships\Models\Odd;
use App\Http\Championships\Pages\BetSlip\Components\BetSlip;
use App\Http\Championships\Pages\Fixture\Components\FixtureForm;
use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    Avatar,
    AvatarStack,
    Block,
    BreadCrumb,
    BreadCrumbItem,
    Button,
    Form,
    Input,
    Text,
    Card,
    Page,
    Row,
    Column,
    Builder};
use App\Http\Championships\Pages\Odd\Components\OddCard;
use App\Http\Championships\Pages\Odd\Components\OddSelectCard;
use App\Http\Championships\Pages\Odd\Views\OddIndexView;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use App\Http\Championships\Models\Fixture;
use Illuminate\Support\Facades\Auth;

class FixtureOddsView
{

    public function odds(Fixture $fixture, $category_id)
    {
        $card = new OddSelectCard();
        $odds = new OddIndexView($card);
        $odds->column_size = 6;
        $odds->filters = [
            'bet_category_id' => $category_id,
            'bookmaker_id' => 1,
            'fixture_id' => $fixture->id
        ];

        return $odds;
    }

    public function schema(Fixture $fixture, Championship $championship)
    {
        $bet_slip_items = [];
        $match_winner = $this->odds($fixture, 1);
        $over_under = $this->odds($fixture, 5);
        $exact_score = $this->odds($fixture, 10);

        $bot_teams_score = $this->odds($fixture, 8);

        $bet_slip = new BetSlip();
        $user = Auth::user()->id;

        return new Row(
            children: [
                new Column(
                    children: [
                        new BreadCrumb(
                            items: [
                                new BreadCrumbItem(
                                    label: 'Profile',
                                    icon: 'feather:user',
                                    link: '/pages/auth/profile'
                                ),
                                new BreadCrumbItem(
                                    label: $championship->title,
                                    link: "/pages/auth/championship_play_{$championship->id}"
                                )
                            ]
                        ),
                    ]
                ),
                new Column(
                    desktop: 8,
                    children: [
                        new Card(
                            children: [
                               new Block(
                                   icon: [
                                       new AvatarStack(
                                           items: [
                                               new Avatar(
                                                   picture: $fixture->home->logo
                                               ),
                                               new Avatar(
                                                   picture: $fixture->away->logo
                                               ),
                                           ]
                                       )
                                   ],
                                   title: "{$fixture->home->name} - {$fixture->away->name}",
                                   subtitle: $fixture->date
                               )
                            ]
                        ),
                        new Form(
                            name: 'bet_slip_form',
                            repo: new RestRepo(
                                url: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip",
                                show: env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip-ids"
                            ),
                            data: [
                                'odd_ids' => $championship->betSlipIds($user)
                            ],
                            on_created: [
                                new Event(
                                    topic: 'bet_cart',
                                    action: 'get',
                                ),
                            ],
                        ),
                        new Accordion(
                            items: [
                                new AccordionItem(
                                    title: '???????????? ????????????????????',
                                    children: [
                                        $match_winner->schema()
                                    ]
                                ),
                                new AccordionItem(
                                    title: '???????? Over/Under',
                                    children: [
                                        $over_under->schema()
                                    ]
                                ),
                                new AccordionItem(
                                    title: 'N?? ?????????????????? ?????? ???? ?????? ????????????',
                                    children: [
                                        $bot_teams_score->schema()
                                    ]
                                ),
                                new AccordionItem(
                                    title: '?????????????? ????????',
                                    children: [
                                        $exact_score->schema()
                                    ]
                                )
                            ]
                        )
                    ]
                ),
                new Column(
                    desktop: 4,
                    children: [
                        $bet_slip->schema($championship)
                    ]
                )
            ]
        );
    }


    public function get(Fixture $fixture, Championship $championship)
    {
        $page = new Page(
            children: [
                $this->schema($fixture, $championship)
            ]
        );
        return $page();
    }
}

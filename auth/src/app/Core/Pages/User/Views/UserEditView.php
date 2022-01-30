<?php

namespace App\Core\Pages\User\Views;

use BenBodan\BetUi\Components\{Accordion,
    AccordionItem,
    BreadCrumb,
    BreadCrumbItem,
    Button,
    Form,
    Card,
    Column,
    Input,
    Page,
    Pagination,
    Row,
    Builder,
    Text
};
use App\Http\Championships\Pages\Bet\Components\BetCard;
use App\Http\Championships\Pages\Bet\Views\BetIndexView;
use App\Http\Championships\Pages\Member\Components\MemberCard;
use App\Http\Championships\Pages\Member\Views\MemberIndexView;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;
use App\Core\Auth\Models\User;
use App\Core\Pages\User\Components\UserForm;

class UserEditView
{

    public function __construct(
        private string       $name = 'users',
        public UserForm      $form,
        public UserIndexView $users
    )
    {
        $this->host = env('APP_URL');
    }


    public function schema($data = [])
    {

        $side_colum = new Column();

        if ($data) {
            $member_card = new MemberCard();
            $memberships = new MemberIndexView($member_card);
            $memberships->column_size = 12;
            $memberships->filters = [
                'per_page' => 2,
                'user_id' => $data['id']
            ];

            $bet_card = new BetCard();
            $bets = new BetIndexView($bet_card);
            $bets->column_size = 12;
            $bets->filters = [
                'per_page' => 2,
                'user_id' => $data['id']
            ];

            $side_colum = new Column(
                desktop: 6,
                children: [
                    new Accordion(
                        items: [
                            new AccordionItem(
                                title: 'Championships',
                                children: [
                                    $memberships->schema()
                                ]
                            ),
                            new AccordionItem(
                                title: 'Bets',
                                children: [
                                    $bets->schema()
                                ]
                            ),
                        ]
                    )
                ]
            );
        }
        return new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            children: [
                                new BreadCrumb(
                                    items: [
                                        new BreadCrumbItem(
                                            label: 'Users',
                                            icon: 'feather:user',
                                            link: '/pages/auth/user'
                                        ),
                                        new BreadCrumbItem(
                                            label: 'Edit',
                                        )
                                    ]
                                )
                            ]
                        ),
                        new Column(
                            desktop: 6,
                            children: [
                                $this->form->schema($data)
                            ]
                        ),
                        $side_colum
                    ]
                )
            ]
        );
    }

    public function get($data = [])
    {
        return ($this->schema($data))();
    }
}

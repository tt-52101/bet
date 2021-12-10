<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{Builder,
    ButtonGroup,
    Input,
    Page,
    Flex,
    FlexItem,
    Card,
    Row,
    Column,
    Button,
    Avatar,
    DropDown,
    DropDownItem,
    Text};
use BenBodan\BetUi\Repositories\{RestRepo, StateRepo};

class UserPageController extends ApiController
{

    public function page()
    {
        $page = new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            children: [
                                new Row(
                                    children: [
                                        new Column(
                                            children: [
                                                new Input(
                                                    placeholder: 'Search',
                                                    focus: 'primary',
                                                    name: 'email',
                                                    icon: 'fab fa-twitter',
                                                    help: 'Search using keywords',
                                                    addons: [
                                                        new Button(
                                                            title: 'Search',
                                                            type: 'primary'
                                                        )
                                                    ]
                                                )
                                            ]
                                        ),
                                        new Builder(
                                            repository: new RestRepo('/api/user'),
                                            children: [
                                                new Column(
                                                    desktop: 6,
                                                    children: [
                                                        new Card(
                                                            header_left: [
                                                                new ButtonGroup(
                                                                    children: [
                                                                        new Button(
                                                                            title: 'Update',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check'
                                                                        ),
                                                                        new Button(
                                                                            title: 'test',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check'
                                                                        ),
                                                                    ]
                                                                )
                                                            ],
                                                            header_right: [
                                                                new Avatar(
                                                                    dot: true,
                                                                    picture: 'https://vuero.cssninja.io/demo/avatars/5.jpg'
                                                                )
                                                            ],
                                                            children: [
                                                                new Text('$email'),
                                                                new Text('$name')
                                                            ]
                                                        )
                                                    ]
                                                )
                                            ]
                                        )
                                    ]
                                )
                            ]
                        ),
                        $this->card("Ben", 12),
                        new Column(
                            desktop: 6,
                            tablet: 8,
                            children: [
                                new Card(
                                    header_left: [

                                    ],
                                    header_right: [
                                        new Avatar(
                                            dot: true,
                                            picture: 'https://vuero.cssninja.io/demo/avatars/5.jpg'
                                        )
                                    ]
                                )
                            ]
                        ),
                    ]
                ),
                new Flex(
                    children: [
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card()
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card()
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card()
                            ]
                        )
                    ]
                ),
                new Flex(
                    children: [
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card()
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card()
                            ]
                        )
                    ]
                )
            ]
        );

        return $page();
    }

    public function card()
    {
        return new Column(
            desktop: 6,
            children: [
                new Card(
                    header_left: [
                        new ButtonGroup(
                            children: [
                                new Button(
                                    title: 'Update',
                                    rounded: true,
                                    icon: 'fa fa-check'
                                ),
                                new Button(
                                    title: 'test',
                                    rounded: true,
                                    icon: 'fa fa-check'
                                ),
                            ]
                        )
                    ],
                    header_right: [
                        new DropDown(
                            type: 'primary',
                            icon: 'feather:more-vertical',
                            children: [
                                new DropDownItem(
                                    icon: 'lnil lnil-bank',
                                    meta: [
                                        new Text('Invest'),
                                        new Text('Buy More Stocks'),
                                    ]
                                ),
                                new DropDownItem(
                                    icon: 'lnil lnil-bank',
                                    meta: [
                                        new Text('Invest'),
                                        new Text('Buy More Stocks'),
                                    ]
                                ),
                                new DropDownItem(
                                    image: '/images/avatars/svg/vuero-1.svg',
                                    meta: [
                                        new Text('Invest'),
                                        new Text('Buy More Stocks'),
                                    ]
                                )
                            ]
                        )
                    ],
                    footer_left: [
                        new Avatar(
                            dot: true,
                            color: 'default',
                            initials: 'AA',
                        )
                    ],
                )
            ]
        );
    }
}

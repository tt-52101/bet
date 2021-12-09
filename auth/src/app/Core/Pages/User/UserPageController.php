<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{ButtonGroup,
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
    Text,
};

class UserPageController extends ApiController
{
    public function card() {
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

    public function page()
    {
        $page = new Page(
            children: [
                new Row(
                    children: [
                        $this->card("Ben", 12),
                        new Column(
                            desktop: 6,
                            children: [
                                new Card(
                                    header_left: [
                                        new Avatar(
                                            dot: true,
                                            dot_color: 'danger',
                                            size: 'large',
                                            picture: 'https://vuero.cssninja.io/demo/avatars/5.jpg'
                                        )
                                    ],
                                    header_right: [
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
}

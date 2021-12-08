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
    Avatar
};

class UserPageController extends ApiController
{
    public function page()
    {
        $page = new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            desktop: 6,
                            children: [
                                new Card(
                                    header_left: [
                                        new ButtonGroup(
                                            children: [
                                                new Button(
                                                    title: 'test',
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
                                            color: 'info',
                                            initials: 'BB',
                                            size: 'large',
                                        )
                                    ],
                                    footer_right: [
                                        new Button(
                                            title: 'test',
                                            rounded: true,
                                            icon: 'fa fa-check',
                                            align: 'right'
                                        ),
                                    ]
                                )
                            ]
                        ),
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
                                    children: [
                                        new Button(
                                            title: 'test',
                                            rounded: true,
                                            icon: 'fa fa-check',
                                            align: 'right'
                                        ),
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

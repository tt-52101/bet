<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{ButtonGroup, Page, Flex, FlexItem, Card, Row, Column, Button};

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

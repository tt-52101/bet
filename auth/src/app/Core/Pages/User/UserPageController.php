<?php

namespace App\Core\Pages\User;
use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{Page, Flex, FlexItem, Card};

class UserPageController extends ApiController{
    public function page(){
        $page = new Page(
            children: [
                new Flex(
                    children: [
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card(
                                    radius: 'small',
                                    color: 'primary'
                                )
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card(
                                    radius: 'small',
                                    color: 'primary'
                                )
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card(
                                    radius: 'small',
                                    color: 'primary'
                                )
                            ]
                        )
                    ]
                ),
                new Flex(
                    children: [
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card(
                                    radius: 'small',
                                    color: 'primary'
                                )
                            ]
                        ),
                        new FlexItem(
                            grow: 1,
                            children: [
                                new Card(
                                    radius: 'small',
                                    color: 'primary'
                                )
                            ]
                        )
                    ]
                )
            ]
        );

        return $page();
    }
}

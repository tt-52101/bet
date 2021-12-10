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
    Form,
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
                                                    name: 'users.query.keyword',
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
                                                                            title: 'Select',
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
                                                                new Form(
                                                                    repo: new RestRepo(''),
                                                                    name: 'user_form_$id',
                                                                    children: [
                                                                        new Input(
                                                                            placeholder: 'Email',
                                                                            focus: 'primary',
                                                                            name: 'email',
                                                                            icon: 'fab fa-twitter',
                                                                            help: 'Search using keywords',
                                                                        ),
                                                                        new Input(
                                                                            placeholder: 'Name',
                                                                            focus: 'primary',
                                                                            name: 'name',
                                                                            icon: 'fab fa-twitter',
                                                                            help: 'Search using keywords',
                                                                        ),
                                                                    ]
                                                                ),
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
                    ]
                ),
            ]
        );

        return $page();
    }
}

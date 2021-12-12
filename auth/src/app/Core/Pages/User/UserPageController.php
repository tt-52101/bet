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
    Text
};
use BenBodan\BetUi\Repositories\{RestRepo, StateRepo};
use BenBodan\BetUi\Events\Event;

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
                                                                            title: 'Create',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check',
                                                                            on_click: [
                                                                                new Event(
                                                                                    topic: 'user_form_$id',
                                                                                    action: 'create',
                                                                                    payload: '$email'
                                                                                )
                                                                            ]
                                                                        ),
                                                                        new Button(
                                                                            title: 'Update',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check',
                                                                            on_click: [
                                                                                new Event(
                                                                                    topic: 'user_form_$id',
                                                                                    action: 'update',
                                                                                    payload: ''
                                                                                )
                                                                            ]
                                                                        ),
                                                                        new Button(
                                                                            title: 'Refresh',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check',
                                                                            on_click: [
                                                                                new Event(
                                                                                    topic: 'user_form_$id',
                                                                                    action: 'refresh',
                                                                                    payload: ''
                                                                                )
                                                                            ]
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
                                                                    repo: new RestRepo(
                                                                        post: 'http://localhost/auth/api/user',
                                                                        get: 'http://localhost/auth/api/user/$id',
                                                                        patch: 'http://localhost/auth/api/user/$id',
                                                                    ),
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

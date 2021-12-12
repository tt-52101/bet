<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use BenBodan\BetUi\Components\{Builder,
    ButtonGroup,
    Input,
    Modal,
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
    Pagination,
    Form,
    Table,
    TableColumn,
    TableRow,
    View,
    Text};
use BenBodan\BetUi\Repositories\{RestRepo, StateRepo};
use BenBodan\BetUi\Events\Event;

class UserPageController extends ApiController
{

    public function modal()
    {
        $page = new Page(
            children: [
                new Row(
                    children: [
                        new Column(
                            children: [
                                new Card(
                                    header_right: [
                                        new Avatar(
                                            dot: true,
                                            picture: 'https://vuero.cssninja.io/demo/avatars/5.jpg'
                                        )
                                    ]
                                )
                            ]
                        )
                    ]
                )
            ]
        );

        return $page();
    }

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
                                                new Table(
                                                    columns: [
                                                        new TableColumn(
                                                            title: 'Email'
                                                        ),
                                                        new TableColumn(
                                                            title: 'Name'
                                                        ),
                                                        new TableColumn(
                                                            end: true,
                                                            title: 'Action',
                                                        )
                                                    ],
                                                    children: [
                                                        new Builder(
                                                            repository: new RestRepo(
                                                                get: 'http://localhost/auth/api/user'
                                                            ),
                                                            name: 'paginated_users',
                                                            children: [
                                                                new TableRow(
                                                                    columns: [
                                                                        new TableColumn(
                                                                            children: [
                                                                                new Avatar(
                                                                                    dot: true,
                                                                                    size: 'large',
                                                                                    picture: 'https://vuero.cssninja.io/demo/avatars/5.jpg'
                                                                                )
                                                                            ]
                                                                        ),
                                                                        new TableColumn(
                                                                            title: 'Email',
                                                                            children: [
                                                                                new Text('$email')
                                                                            ]
                                                                        ),
                                                                        new TableColumn(
                                                                            title: 'Name',
                                                                            children: [
                                                                                new Text('$name')
                                                                            ]
                                                                        ),
                                                                        new TableColumn(
                                                                            title: 'Actions',
                                                                            end: true,
                                                                            children: [
                                                                                new Button(
                                                                                    title: 'Save'
                                                                                )
                                                                            ]
                                                                        )
                                                                    ]
                                                                ),
                                                            ]
                                                        )
                                                    ]
                                                )
                                            ]
                                        ),
                                        new Modal(
                                            name: 'user_edit_modal',
                                            size: 'big',
                                            children: [
                                                new View(
                                                    repo: new RestRepo('http://localhost/auth/api/page/user')
                                                )
                                            ],
                                            footer: [
                                                new Button(
                                                    type: 'primary',
                                                    title: 'Confirm'
                                                )
                                            ]
                                        ),
                                        new Column(
                                            children: [
                                                new Input(
                                                    placeholder: 'Search',
                                                    focus: 'primary',
                                                    name: 'paginated_users.query.keyword',
                                                    icon: 'fa fa-search',
                                                    help: 'Search using keywords',
                                                    on_enter: [
                                                        new Event(
                                                            topic: 'paginated_users',
                                                            action: 'search',
                                                        )
                                                    ],
                                                    addons: [
                                                        new ButtonGroup(
                                                            children: [
                                                                new Button(
                                                                    icon: 'fa fa-search',
                                                                    type: 'primary',
                                                                    on_click: [
                                                                        new Event(
                                                                            topic: 'paginated_users',
                                                                            action: 'search',
                                                                        )
                                                                    ]
                                                                ),
                                                                new Button(
                                                                    icon: 'fa fa-redo',
                                                                    type: 'primary',
                                                                    on_click: [
                                                                        new Event(
                                                                            topic: 'paginated_users',
                                                                            action: 'clear',
                                                                        )
                                                                    ]
                                                                )
                                                            ]
                                                        )
                                                    ]
                                                )
                                            ]
                                        ),
                                        new Column(
                                            children: [
                                                new Pagination(
                                                    name: 'paginated_users.meta',
                                                    on_change: [
                                                        new Event(
                                                            topic: 'paginated_users',
                                                            action: 'get',
                                                        )
                                                    ]
                                                )
                                            ]
                                        ),
                                        new Builder(
                                            repository: new RestRepo(
                                                get: 'http://localhost/auth/api/user'
                                            ),
                                            name: 'paginated_users',
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
                                                                            title: 'Create',
                                                                            rounded: true,
                                                                            icon: 'fa fa-check',
                                                                            on_click: [
                                                                                new Event(
                                                                                    topic: 'user_form_$id',
                                                                                    action: 'create',
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
                                                            footer_right: [
                                                                new Button(
                                                                    rounded: true,
                                                                    title: 'Add',
                                                                    icon: 'fa fa-plus',
                                                                    on_click: [
                                                                        new Event(
                                                                            topic: 'user_edit_modal',
                                                                            action: 'show',
                                                                        )
                                                                    ]
                                                                )
                                                            ],
                                                            children: [
                                                                new Form(
                                                                    repo: new RestRepo('http://localhost/auth/api/user'),
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

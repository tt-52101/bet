<?php

namespace App\Core\Pages\User\Components;

use BenBodan\BetUi\Components\{ButtonGroup, Form, Button, Card, Column, Input, Page, Pagination, Row, Builder, Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;
use Illuminate\Validation\Rules\In;

class UserForm
{

    public function __construct(
        private string $name = 'users',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {
        return new Form(
            repo: new RestRepo($this->host . '/auth/api/user'),
            name: "{$this->name}_form",
            data: $data,
            children: [
                new Card(
                    header_left: [
                        new ButtonGroup(
                            children: [
                                new Button(
                                    title: 'Back',
                                    icon: 'fa fa-chevron-left',
                                    rounded: true,
                                    on_click: [
                                        new Event(
                                            action: 'back',
                                            topic: "route"
                                        )
                                    ]
                                ),
                                new Button(
                                    title: 'Update',
                                    icon: 'fa fa-save',
                                    rounded: true,
                                    on_click: [
                                        new Event(
                                            action: 'update',
                                            topic: "{$this->name}_form"
                                        )
                                    ]
                                ),
                                new Button(
                                    title: 'Refresh',
                                    icon: 'fa fa-redo',
                                    rounded: true,
                                    on_click: [
                                        new Event(
                                            action: 'show',
                                            topic: "{$this->name}_form"
                                        )
                                    ]
                                )
                            ]
                        ),
                    ],
                    children: [
                        new Row(
                            children: $this->fields()
                        )
                    ]
                )
            ]
        );
    }

    public function get()
    {
        return ($this->schema())();
    }

    public function fields()
    {

        $fields = [];

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'email'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'name'
                )
            ]
        );

        return $fields;
    }
}

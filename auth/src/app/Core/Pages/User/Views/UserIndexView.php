<?php

namespace App\Core\Pages\User\Views;

use BenBodan\BetUi\Components\{Button, Card, Column, Input, Page, Pagination, Row, Builder, Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;

class UserIndexView
{

    public function __construct(
        private string $name = 'users',
    )
    {
        $this->host = env('APP_URL');
    }

    public function search()
    {
        return new Column(
            desktop: 6,
            children: [
                new Input(
                    icon: 'fa fa-search',
                    placeholder: 'Search',
                    name: "paginated_$this->name.query.keyword",
                    on_enter: [
                        $this->searchEvent()
                    ],
                    addons: [
                        new Button(
                            align: 'right',
                            title: 'Add',
                            icon: 'fa fa-plus',
                            type: 'primary',
                            on_click: [
                                new Event(
                                    topic: 'route',
                                    action: 'push',
                                    payload: '/pages/auth/user_new'
                                )
                            ]
                        ),
                    ]
                )
            ]
        );

    }

    public function searchEvent()
    {
        return new Event(
            action: 'get',
            topic: "paginated_{$this->name}"
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/user_edit_$id'
        );
    }

    public function schema()
    {
        return new Row(
            children: [
                $this->search(),
                $this->addNewButton(),
                $this->results()
            ]
        );
    }

    public function addNewButton()
    {
        return new Column(
            desktop: 6,
            children: [

            ]
        );
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_{$this->name}.meta",
                    on_change: [
                        $this->searchEvent()
                    ]
                )
            ]
        );
    }

    public function userCard()
    {
        return new Card(
            header_right: [
                new Button(
                    icon: 'fa fa-edit',
                    title: 'Edit',
                    rounded: true,
                    on_click: [
                        $this->editEvent()
                    ]
                )
            ],
            children: [
                new Text('$email'),
                new Text('$name'),
            ]
        );
    }

    public function results()
    {
        return new Column(
            children: [
                new Row(
                    children: [
                        $this->pagination(),
                        new Builder(
                            repository: new RestRepo("{$this->host}/auth/api/user"),
                            name: "paginated_{$this->name}",
                            children: [
                                new Column(
                                    desktop: 6,
                                    children: [
                                        $this->userCard()
                                    ]
                                )
                            ]
                        )
                    ]
                )
            ]
        );
    }

    public function get()
    {
        $page = new Page(
            children: [
                $this->schema()
            ]
        );
        return $page();
    }
}

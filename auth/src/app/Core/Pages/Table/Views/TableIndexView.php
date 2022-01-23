<?php

namespace App\Core\Pages\Table\Views;

use BenBodan\BetUi\Components\{Button, Card, Column, Component, Input, Page, Pagination, Row, Builder, Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;

class TableIndexView
{

    public function __construct(
        public Component $card
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
                    name: "paginated_table.query.keyword",
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
                                    payload: '/pages/auth/table_new'
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
            topic: "paginated_table"
        );
    }

    public function editEvent()
    {
        return new Event(
            action: 'push',
            topic: 'route',
            payload: '/pages/auth/table_edit_$id'
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
                    name: "paginated_table.meta",
                    on_change: [
                        $this->searchEvent()
                    ]
                )
            ]
        );
    }

    public function tableCard()
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
                            repository: new RestRepo("{$this->host}/auth/api/table"),
                            name: "paginated_table",
                            children: [
                                new Column(
                                    desktop: 6,
                                    children: [
                                        $this->card->schema()
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

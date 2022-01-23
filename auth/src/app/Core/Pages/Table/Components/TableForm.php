<?php

namespace App\Core\Pages\Table\Components;

use BenBodan\BetUi\Components\{BreadCrumb,
    BreadCrumbItem,
    ButtonGroup,
    Form,
    Button,
    Card,
    Column,
    Input,
    Page,
    Pagination,
    Row,
    Builder,
    Select,
    Tab,
    Tabs,
    Text};
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Events\Event;
use Illuminate\Validation\Rules\In;
use App\Core\Models\Role;
class TableForm
{

    public function __construct(
        private string $name = 'tables',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {
        return new Form(
            repo: new RestRepo($this->host . '/auth/api/table'),
            name: "{$this->name}_form",
            data: $data,
            children: [
                new Card(
                    header_left: [
                        new ButtonGroup(
                            children: $this->buttons($data)
                        ),
                    ],
                    children: [
                        new Row(
                            children: $this->fields()
                        )
                    ]
                )
            ],
            on_created: [
                new Event(
                    action: 'push',
                    topic: 'route',
                    payload: '/pages/auth/table_edit_$id'
                )
            ]
        );
    }

    public function get()
    {
        return ($this->schema())();
    }

    public function buttons($data = [])
    {
        $buttons = [];

        $buttons[] = new Button(
            title: 'Back',
            icon: 'fa fa-chevron-left',
            rounded: true,
            on_click: [
                new Event(
                    action: 'back',
                    topic: "route"
                )
            ]
        );

        if ($data) {

            $buttons[] = new Button(
                title: 'Update',
                icon: 'fa fa-save',
                rounded: true,
                on_click: [
                    new Event(
                        action: 'update',
                        topic: "{$this->name}_form"
                    )
                ]
            );

            $buttons[] = new Button(
                title: 'Refresh',
                icon: 'fa fa-redo',
                rounded: true,
                on_click: [
                    new Event(
                        action: 'show',
                        topic: "{$this->name}_form"
                    )
                ]
            );
        }

        if(!$data){
            $buttons[] = new Button(
                title: 'Save',
                icon: 'fa fa-save',
                rounded: true,
                on_click: [
                    new Event(
                        action: 'create',
                        topic: "{$this->name}_form"
                    )
                ]
            );
        }


        return $buttons;
    }

    public function fields()
    {

        $fields = [];
        $account_fields = [];

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'title'
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


        $components[] = new Column(
            children: [
                new Tabs(
                    active: 'info',
                    tabs: [
                        new Tab(
                            label: 'Info',
                            icon: 'fas fa-table',
                            value: 'info',
                            children: [
                                new Row(
                                    children: $fields
                                )
                            ]
                        ),
                    ]
                )
            ]
        );


        return $components;
    }
}

<?php

namespace App\Core\Pages\Permission\Components;

use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Avatar,
    Button,
    ButtonGroup,
    Card,
    Column,
    Datepicker,
    Form,
    Input,
    Progress,
    Row,
    SwitchInput,
    Select,
    Text
};
use App\Core\Models\Role;

class PermissionForm
{

    public function __construct(
        private string $name = 'permission',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {

        return new Form(
            repo: new RestRepo(env('APP_URL') . '/auth/api/permission'),
            name: "{$this->name}_form",
            data: $data,
            children: [
                new Card(
                    header_left: [
                        new ButtonGroup(
                            children: $this->buttons($data)
                        )
                    ],
                    header_right: [
                        new Avatar(
                            initials: '$name',
                            color: 'primary'
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
                    payload: '/pages/auth/permission_edit_$id'
                )
            ]
        );
    }

    public function fields()
    {
        $fields = [];


        $fields[] = new Column(
            children: [
                new Input(
                    name: 'title',
                    title: 'Title'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'name',
                    title: 'Name'
                )
            ]
        );

        $roles = Role::all();
        $fields[] = new Column(
            children: [
                new Select(
                    name: 'role_ids',
                    multiple: true,
                    options: $roles->toArray()
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'active',
                    title: 'Active'
                )
            ]
        );

        return $fields;
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

        if (!$data) {
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


    public function get()
    {
        return ($this->schema())();
    }
}

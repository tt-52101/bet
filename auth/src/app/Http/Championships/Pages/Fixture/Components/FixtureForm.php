<?php

namespace App\Http\Championships\Pages\Fixture\Components;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\FixtureStatus;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Avatar,
    AvatarStack,
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
use App\Http\Championships\Models\Fixture;

class FixtureForm
{

    public function __construct(
        private string $name = 'fixture',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {

        return new Form(
            repo: new RestRepo(env('APP_URL') . '/auth/api/fixture'),
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
                        new AvatarStack(
                            size: 'large',
                            items: [
                                new Avatar(
                                    picture: '$home_logo',
                                ),
                                new Avatar(
                                    picture: '$away_logo',
                                ),
                            ]
                        )
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
                    payload: '/pages/auth/fixture_edit_$id'
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
                    name: 'api_id',
                    placeholder: 'Api Id'
                )
            ]
        );

        $statuses = FixtureStatus::all()->toArray();
        $fields[] = new Column(
            children: [
                new Select(
                    name: 'status_id',
                    options: $statuses
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Datepicker(
                    title: 'Date',
                    name: 'date'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Input(
                    name: 'country',
                    placeholder: 'Country',
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Input(
                    name: 'league',
                    placeholder: 'League'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Input(
                    name: 'home_goals',
                    placeholder: 'Home Goals'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Input(
                    name: 'away_goals',
                    placeholder: 'Away Goals'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new SwitchInput(
                    name: 'home_winner',
                    title: 'Home WInner'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new SwitchInput(
                    name: 'away_winner',
                    title: 'Away Winner'
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

<?php

namespace App\Http\Championships\Pages\Season\Components;


use App\Http\Championships\Models\Country;
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
    Text};

class SeasonForm
{

    public function __construct(
        private string $name = 'season',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {

        return new Form(
            repo: new RestRepo(env('APP_URL') . '/auth/api/season'),
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
                            size: 'big',
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
                    payload: '/pages/auth/season_edit_$id'
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
                    name: 'year',
                    placeholder: 'Year'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'Start',
                    name: 'start'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'End',
                    name: 'end'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'current',
                    title: 'Current'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'standings',
                    title: 'Standings'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'players',
                    title: 'Players'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'events',
                    title: 'Events'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'odds',
                    title: 'Odds'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'predictions',
                    title: 'Predictions'
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

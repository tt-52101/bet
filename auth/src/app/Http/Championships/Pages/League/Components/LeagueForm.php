<?php

namespace App\Http\Championships\Pages\League\Components;


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

class LeagueForm
{

    public function __construct(
        private string $name = 'league',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {

        return new Form(
            repo: new RestRepo(env('APP_URL') . '/auth/api/league'),
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
                            picture: '$logo',
                            badge: '$country_flag',
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
                    payload: '/pages/auth/league_edit_$id'
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
                    name: 'name',
                    placeholder: 'Name'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'type',
                    placeholder: 'Type'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'api_id',
                    placeholder: 'Api Id'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'logo',
                    placeholder: 'logo'
                )
            ]
        );

        $countries = Country::get();
        //$countries = (new CountryCollection($countries))->resolve();

        $fields[] = new Column(
            children: [
                new Select(
                    name: 'country_id',
                    options: $countries->toArray(),
                    labelProp: 'name'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'Fixture Last Sync',
                    name: 'fixtures_sync'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'Odds Last Syn',
                    name: 'odds_sync'
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

<?php

namespace App\Http\Championships\Pages\Championship\Components;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\League;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Button,
    ButtonGroup,
    Card,
    Column,
    Datepicker,
    Form,
    Input,
    Progress,
    Row,
    Select,
    SwitchInput,
    Text};
use Illuminate\Support\Facades\Date;

class ChampionshipForm
{

    public function __construct(
        private string $name = 'championship',
    )
    {
        $this->host = env('APP_URL');
    }

    public function schema($data = [])
    {

        return new Form(
            repo: new RestRepo(env('APP_URL') . '/auth/api/championship'),
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
                        new SwitchInput(
                            name: 'published',
                            title: 'Published'
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
                    payload: '/pages/auth/championship_edit_$id'
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
                    placeholder: 'Title'
                )
            ]
        );

        $fields[] = new Column(
            children: [
                new Input(
                    name: 'description',
                    placeholder: 'Description'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new Datepicker(
                    name: 'start_at',
                    title: 'Start'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new Datepicker(
                    name: 'end_at',
                    title: 'End'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new Input(
                    name: 'points',
                    placeholder: 'Points'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 4,
            children: [
                new SwitchInput(
                    name: 'football',
                    title: 'Football'
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

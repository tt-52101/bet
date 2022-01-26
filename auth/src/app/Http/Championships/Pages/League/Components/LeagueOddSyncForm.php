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
    Text
};
use Carbon\Carbon;

class LeagueOddSyncForm
{

    public function schema($data = [])
    {
        $league_id = $data['id'];
        return new Card(
            header_right: [
                new Button(
                    title: 'Sync Odds',
                    rounded: true,
                    on_click: [
                        new Event(
                            topic: 'league_sync_form',
                            action: 'create'
                        )
                    ]
                ),
            ],
            children: [
                new Form(
                    name: 'league_sync_form',
                    repo: new RestRepo(
                        url: env('APP_URL') . "/auth/api/league/{$league_id}/odds/sync",
                    ),
                    data: [
                        'from' => Carbon::now(),
                        'to' => Carbon::now()->addDays(7),
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

    public function fields()
    {
        $fields = [];

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'From',
                    name: 'from'
                )
            ]
        );

        $fields[] = new Column(
            desktop: 6,
            children: [
                new Datepicker(
                    title: 'To',
                    name: 'to'
                )
            ]
        );

        return $fields;
    }

    public function get()
    {
        return ($this->schema())();
    }
}

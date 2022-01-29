<?php

namespace App\Http\Championships\Pages\League\Components;


use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Season;
use App\Http\Championships\Resources\SeasonCollection;
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

class LeagueFixtureSyncForm
{

    public function schema($data = [])
    {
        $league_id = $data['id'];
        return new Card(
            header_right: [
                new Button(
                    title: 'Sync Fixtures',
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
                        url: env('APP_URL') . "/auth/api/league/{$league_id}/sync",
                    ),
                    data: [
                        'from' => Carbon::now(),
                        'to' => Carbon::now()->addDays(7),
                    ],
                    children: [
                        new Row(
                            children: $this->fields($league_id)
                        )
                    ]
                )
            ]
        );
    }

    public function fields(int $league_id)
    {
        $fields = [];

        $seasons = Season::where('league_id', $league_id)->orderBy('year', 'desc')->get();
        $seasons = (new SeasonCollection($seasons))->resolve()['data'];
        $fields[] = new Column(
            children: [
                new Select(
                    name: 'season',
                    valueProp: 'year',
                    labelProp: 'year',
                    options: $seasons->toArray()
                )
            ]
        );

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

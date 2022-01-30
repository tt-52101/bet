<?php

namespace App\Http\Championships\Pages\Championship\Components;


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

class ChampionshipSyncForm
{

    public function schema($data = [])
    {
        $championship_id = $data['id'];
        return new Card(
            header_right: [
                new Button(
                    title: 'Sync Championship',
                    rounded: true,
                    on_click: [
                        new Event(
                            topic: 'championship_sync_form',
                            action: 'create'
                        )
                    ]
                ),
            ],
            children: [
                new Form(
                    name: 'championship_sync_form',
                    repo: new RestRepo(
                        url: env('APP_URL') . "/auth/api/championship/{$championship_id}/sync",
                    ),
                    children: [
                        new Row(
                            children: $this->fields($championship_id)
                        )
                    ]
                )
            ]
        );
    }

    public function fields($championship_id)
    {
        $fields = [];

        return $fields;
    }

    public function get()
    {
        return ($this->schema())();
    }
}

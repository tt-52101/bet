<?php

namespace App\Http\Championships\Pages\League;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\League;
use App\Http\Championships\Pages\Country\Components\CountryCard;
use App\Http\Championships\Pages\Country\Views\CountryIndexView;
use App\Http\Championships\Pages\League\Components\LeagueCard;
use App\Http\Championships\Pages\League\Views\LeagueEditView;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Button, Column, Form, Page, Radio, Row, Card, SwitchInput};
use App\Http\Championships\Pages\League\Views\LeagueIndexView;
use App\Http\Championships\Resources\League as LeagueResource;

class LeagueSelectWizard extends ApiController
{
    public $form_url = '';

    public function __construct($form_url)
    {
        $this->form_url = $form_url;
    }

    public function wizard()
    {

        $body = $this->selectCountry();

        if (request()->has('country_id')) {
            $body = $this->selectLeague(request()->country_id);
        }

        $form = new Form(
            name: 'add_league',
            data: request()->all(),
            repo: new RestRepo(
                url: $this->form_url
            ),
            children: [
                $body
            ]
        );

        $page = new Page(
            children: [
                $form
            ]
        );
        return $page();
    }


    public function selectCountry()
    {
        $card = new CountryCard();

        $card->setActions([
            new Radio(
                name: 'country_id',
                color: 'primary',
                title: 'Select',
                value: '$id'
            )
        ]);

        $countries = new CountryIndexView($card);

        $countries->column_size = 6;
        $countries->filters = [
            'per_page' => 10
        ];
        return $countries->schema();
    }

    public function selectLeague($country_id)
    {
        $card = new LeagueCard();

        $card->setActions([
            new Radio(
                name: 'league_id',
                color: 'primary',
                title: 'Select',
                value: '$id'
            )
        ]);

        $leagues = new LeagueIndexView($card);

        $leagues->column_size = 12;
        $leagues->filters = [
            'per_page' => 4,
            'country_id' => $country_id
        ];
        return $leagues->schema();
    }
}

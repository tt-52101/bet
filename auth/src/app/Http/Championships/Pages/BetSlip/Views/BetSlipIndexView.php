<?php

namespace App\Http\Championships\Pages\BetSlip\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\BetSlip\Components\BetSlipPoints;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Component, Page, Pagination, Row, Column, Builder};
use App\Http\Championships\Models\Championship;

class BetSlipIndexView
{

    public function __construct(
        public Component $card,
    )
    {

    }

    public function schema(Championship $championship)
    {
        return new Row(
            children: [
                new Column(
                    children: [
                        $this->results($championship)
                    ]
                )
            ]
        );
    }

    public function results(Championship $championship)
    {
        $points = new BetSlipPoints(completed: true);
        return new Row(
            children: [
                new Column(
                    children: [
                        $points->schema($championship)
                    ]
                ),
                new Builder(
                    repository: new RestRepo(env('APP_URL') . "/auth/api/championship/{$championship->id}/bet-slip"),
                    name: 'bet_cart',
                    children: [
                        new Column(
                            desktop: 4,
                            children: [
                               $this->card->schema($championship)
                            ]
                        )
                    ]
                ),
            ]
        );
    }

    public function searchInput()
    {
        return (new SearchInput('paginated_countries.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_countries.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_countries',
                            action: 'get',
                        )
                    ]
                )
            ]
        );
    }



    public function onSearch()
    {
        return [
            new Event(
                topic: 'paginated_countries',
                action: 'search',
            )
        ];
    }

    public function get(Championship $championship)
    {
        $page = new Page(
            children: [
                $this->schema($championship)
            ]
        );
        return $page();
    }
}

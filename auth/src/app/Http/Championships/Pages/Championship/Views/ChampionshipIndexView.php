<?php

namespace App\Http\Championships\Pages\Championship\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Championship\Components\ChampionshipCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Component, Page, Row, Column, Builder};

class ChampionshipIndexView
{

    public array $filters = [];
    public function __construct(
        public Component $card,
    )
    {

    }

    public function schema($data = [])
    {
        return new Row(
            children: [
                new Column(
                    children: [
                        $this->searchInput()
                    ]
                ),
                new Column(
                    children: [
                        $this->results()
                    ]
                )
            ]
        );
    }

    public function results()
    {
        return new Row(
            children: [
                new Builder(
                    name: 'paginated_championships',
                    repository: new RestRepo(
                        url: env('APP_URL') . '/auth/api/championship',
                        filters: $this->filters,
                    ),
                    children: [
                        new Column(
                            desktop: 6,
                            children: [
                               $this->card->schema()
                            ]
                        )
                    ]
                )
            ]
        );
    }

    public function searchInput()
    {
        return (new SearchInput('paginated_championships.query.keyword'))->onEnter($this->onSearch());
    }

    public function onSearch()
    {
        return [
            new Event(
                topic: 'paginated_championships',
                action: 'search',
            )
        ];
    }

    public function get()
    {
        $page = new Page(
            children: [
                $this->schema()
            ]
        );
        return $page();
    }
}

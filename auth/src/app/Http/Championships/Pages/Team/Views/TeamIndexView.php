<?php

namespace App\Http\Championships\Pages\Team\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Team\Components\TeamCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Page, Pagination, Row, Column, Builder, SwitchInput};

class TeamIndexView
{
    public int $column_size = 6;
    public array $filters = [];

    public function __construct(
        public TeamCard $card,
    )
    {

    }

    public function schema($data = [])
    {
        return new Row(
            children: [
                new Column(
                    desktop: 6,
                    children: [
                        new SwitchInput(
                            name: 'paginated_teams.query.has_odds',
                            title: 'Has Odds',
                            on_change: $this->onSearch()

                        )
                    ]
                ),
                new Column(
                    desktop: 6,
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
                $this->pagination(),
                new Builder(
                    repository: new RestRepo(
                        url: env('APP_URL') . '/auth/api/team',
                        filters: $this->filters
                    ),
                    name: 'paginated_teams',
                    children: [
                        new Column(
                            desktop: $this->column_size,
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
        return (new SearchInput('paginated_teams.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_teams.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_teams',
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
                topic: 'paginated_teams',
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

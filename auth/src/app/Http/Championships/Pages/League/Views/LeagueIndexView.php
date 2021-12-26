<?php

namespace App\Http\Championships\Pages\League\Views;

use App\Core\Components\SearchInput;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Page, Pagination, Row, Column, Builder, SwitchInput};
use BenBodan\BetUi\Components\Component;

class LeagueIndexView
{
    public int $column_size = 4;
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
                    desktop: 6,
                    children: [
                        new SwitchInput(
                            name: 'paginated_leagues.query.has_fixtures',
                            title: 'Has Fixtures',
                            on_change: $this->onSearch()

                        )
                    ]
                ),
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
                $this->pagination(),
                new Builder(
                    repository: new RestRepo(
                        url: env('APP_URL') . '/auth/api/league',
                        filters: $this->filters
                    ),
                    name: 'paginated_leagues',
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
        return (new SearchInput('paginated_leagues.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_leagues.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_leagues',
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
                topic: 'paginated_leagues',
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

<?php

namespace App\Http\Championships\Pages\Fixture\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Fixture\Components\FixtureCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Page, Pagination, Row, Column, Builder, Select, SwitchInput};

class FixtureIndexView
{
    public $column_size = 6;
    public array $filters = [];

    public function __construct(
        public FixtureCard $card,
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
                        new Row(
                            children: [
                                new Column(
                                    desktop: 6,
                                    children: [
                                        new SwitchInput(
                                            name: 'paginated_fixtures.query.has_odds',
                                            title: 'Has Odds',
                                            on_change: $this->onSearch()

                                        ),
                                    ]
                                ),
                                new Column(
                                    desktop: 6,
                                    children: [
                                        new SwitchInput(
                                            name: 'paginated_fixtures.query.has_bets',
                                            title: 'Has Bets',
                                            on_change: $this->onSearch()
                                        )
                                    ]
                                )
                            ]
                        ),
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
                        url: env('APP_URL') . '/auth/api/fixture',
                        filters: $this->filters
                    ),
                    name: 'paginated_fixtures',
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
        return (new SearchInput('paginated_fixtures.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_fixtures.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_fixtures',
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
                topic: 'paginated_fixtures',
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

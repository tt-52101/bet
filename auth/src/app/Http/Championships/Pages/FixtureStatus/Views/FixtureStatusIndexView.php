<?php

namespace App\Http\Championships\Pages\FixtureStatus\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\FixtureStatus\Components\FixtureStatusCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Page, Pagination, Row, Column, Builder};

class FixtureStatusIndexView
{

    public function __construct(
        public FixtureStatusCard $card,
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
                $this->pagination(),
                new Builder(
                    repository: new RestRepo(env('APP_URL') . '/auth/api/fixture-status'),
                    name: 'paginated_fixture_statuses',
                    children: [
                        new Column(
                            desktop: 4,
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
        return (new SearchInput('paginated_fixture_statuses.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_fixture_statuses.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_fixture_statuses',
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
                topic: 'paginated_fixture_statuses',
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

<?php

namespace App\Http\Championships\Pages\Country\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Country\Components\CountryCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Page, Pagination, Row, Column, Builder};

class CountryIndexView
{
    public int $column_size = 3;
    public array $filters = [];

    public function __construct(
        public CountryCard $card,
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
                    repository: new RestRepo(
                        url: env('APP_URL') . '/auth/api/country',
                        filters: $this->filters
                    ),
                    name: 'paginated_countries',
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

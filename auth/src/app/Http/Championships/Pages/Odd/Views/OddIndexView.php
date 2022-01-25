<?php

namespace App\Http\Championships\Pages\Odd\Views;

use App\Core\Components\SearchInput;
use App\Http\Championships\Pages\Odd\Components\OddCard;
use BenBodan\BetUi\Events\Event;
use BenBodan\BetUi\Repositories\RestRepo;
use BenBodan\BetUi\Components\{Card, Component, Page, Pagination, Row, Column, Builder};
use PhpParser\Node\Expr\Cast\Object_;

class OddIndexView
{
    public $column_size = 4;
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
                $this->pagination(),
                new Builder(
                    repository: new RestRepo(
                        url: env('APP_URL') . '/auth/api/odd',
                        filters: $this->filters
                    ),
                    name: 'paginated_odds',
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
        return (new SearchInput('paginated_odds.query.keyword'))->onEnter($this->onSearch());
    }

    public function pagination()
    {
        return new Column(
            children: [
                new Pagination(
                    name: "paginated_odds.meta",
                    on_change: [
                        new Event(
                            topic: 'paginated_odds',
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
                topic: 'paginated_odds',
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

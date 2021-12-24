<?php

namespace App\Core\Components;


use BenBodan\BetUi\Components\Input;

class SearchInput
{
    private $component;
    private $on_enter = [];

    public function __construct(
        public string $name = 'keyword',
    )
    {
    }

    public function onEnter($events)
    {
        $this->on_enter = $events;
        return $this;
    }

    public function __invoke()
    {
        $component = new Input(
            icon: 'fa fa-search',
            placeholder: 'Search',
            name: $this->name,
            on_enter: $this->on_enter
        );
        return $component();
    }

}

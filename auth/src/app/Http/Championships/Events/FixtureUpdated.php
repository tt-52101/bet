<?php

namespace App\Http\Championships\Events;
use App\Http\Championships\Models\Fixture;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FixtureUpdated {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Fixture $fixture
    )
    {

    }
}

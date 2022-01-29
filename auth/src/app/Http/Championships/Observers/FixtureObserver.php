<?php

namespace App\Http\Championships\Observers;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Events\FixtureUpdated;

class FixtureObserver
{
    /**
     * Handle the Fixture "created" event.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return void
     */
    public function created(Fixture $fixture)
    {
        //
    }

    /**
     * Handle the Fixture "updated" event.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return void
     */
    public function updated(Fixture $fixture)
    {
        $event = new FixtureUpdated($fixture);
        event($event);
    }

    /**
     * Handle the Fixture "deleted" event.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return void
     */
    public function deleted(Fixture $fixture)
    {
        //
    }

    /**
     * Handle the Fixture "restored" event.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return void
     */
    public function restored(Fixture $fixture)
    {
        //
    }

    /**
     * Handle the Fixture "force deleted" event.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return void
     */
    public function forceDeleted(Fixture $fixture)
    {
        //
    }
}

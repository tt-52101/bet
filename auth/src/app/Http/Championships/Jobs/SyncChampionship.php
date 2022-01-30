<?php

namespace App\Http\Championships\Jobs;

use App\Http\Championships\Models\Championship;
use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Championships\Models\Fixture;
use function PHPUnit\Framework\countOf;

class SyncChampionship implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private Championship $championship,
    )
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $leagues = $this->championship->leagues;
        $now = Carbon::now();
        $weekStart = $now->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:m');
        $weekEnd = $now->endOfWeek(Carbon::SUNDAY)->format('Y-m-d H:m');

        foreach ($leagues as $league){
            $season = (int) $league->seasons()->orderBy('year', 'desc')->first()->year;
            $sync_fixtures = new SyncLeagueFixtures($league, $weekStart, $weekEnd, $season);
            dispatch($sync_fixtures);

            $sync_odds = new SyncLeagueOdds($league, $season);
            dispatch($sync_odds);
        }
    }
}

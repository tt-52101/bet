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

class SyncChampionships implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
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
        $now = Carbon::now();

        $start = Carbon::createFromTimeString('12:00');
        $end = Carbon::createFromTimeString('24:00');

        if ($now->between($start, $end)) {
            $championships = Championship::withoutGlobalScopes()
                ->isPublished()->get();

            foreach ($championships as $championship) {
                $job = new SyncChampionship($championship);
                dispatch($job);
            }
        }
    }
}

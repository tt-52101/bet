<?php

namespace App\Http\Championships\Jobs;

use App\Http\Championships\Models\BetCategory;
use App\Http\Championships\Models\Bookmaker;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Odd;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\Odds\FixturesApi;
use App\Http\Championships\Models\Fixture;

class SyncBookmakereOdds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private Fixture   $fixture,
        private Bookmaker $bookmaker,
        private array     $bets
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
        $this->createOrUpdateBets($this->bets);
    }

    public function createOrUpdateBets(array $bets)
    {
        foreach ($bets as $bet) {
            $category = BetCategory::where('api_id', $bet['id'])->first();
            $this->createOrUpdateOdds($category, $bet['values']);
        }
    }

    public function createOrUpdateOdds(BetCategory $category , array $bets){
        foreach ($bets as $odd) {
            $odd = Odd::updateOrCreate([
                'fixture_id' => $this->fixture->id,
                'bookmaker_id' => $this->bookmaker->id,
                'bet_category_id' => $category->id,
                'value' => $odd['value']
            ], [
                'odd' => round($odd['odd'], 2)
            ]);
        }
    }
}

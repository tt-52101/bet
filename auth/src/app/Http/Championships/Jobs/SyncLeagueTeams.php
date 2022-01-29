<?php

namespace App\Http\Championships\Jobs;

use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\FootballApi\Teams\TeamsApi;

class SyncLeagueTeams implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private League $league,
        private String $season,
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
        $country = $this->league->country->name;
        $response = (new TeamsApi())->get($country, $this->league->api_id, $this->season);
        $this->createOrUpdateTeams($response['response']);
    }

    public function createOrUpdateTeams(array $teams){
        foreach ($teams as $team){
            Team::updateOrCreate([
                'league_id' => $this->league->id,
                'country_id' => $this->league->country_id,
                'api_id'=> $team['team']['id'],
            ],[
                'name' => $team['team']['name'],
                'logo' => $team['team']['logo'],
                'founded' => $team['team']['founded'],
                'national' => $team['team']['national']
            ]);
        }
    }
}

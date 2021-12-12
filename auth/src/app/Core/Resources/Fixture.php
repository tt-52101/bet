<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class Fixture extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'league_name' => $this->league['name'],
            'fixture_id' => $this->fixture['id'],
            'country' => $this->league['country'],
            'date' => Carbon::parse($this->fixture['date'])->format('d-m-Y H:m'),
            'home_team' => $this->teams['home']['name'],
            'home_logo' => $this->teams['home']['logo'],
            'away_team' => $this->teams['away']['name'],
            'away_logo' => $this->teams['away']['logo'],
            'match_winner' => $this->matchWinner($this->odds),
            'home' => $this->matchWinner($this->odds)['home'],
            'away' => $this->matchWinner($this->odds)['away'],
            'draw' => $this->matchWinner($this->odds)['draw'],
        ];
    }
}

<?php

namespace App\Http\Championships\Factories;

use App\Http\Championships\Models\Championship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ChampionshipFactory extends Factory
{

    protected $model = Championship::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->realText,
            'start_at' => Carbon::now()->subHours(random_int(24,720)),
            'end_at' => Carbon::now()->addHours(random_int(24,720)),
            'football' => random_int(0,1),
            'points' => random_int(100,300),
        ];
    }
}

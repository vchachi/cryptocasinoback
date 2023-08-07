<?php

namespace Database\Factories;

use App\Models\GameLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'game_detail_id' => $this->faker->word,
        'status' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'log' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

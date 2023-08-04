<?php

namespace Database\Factories;

use App\Models\GameDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'game_type_id' => $this->faker->word,
        'customer_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

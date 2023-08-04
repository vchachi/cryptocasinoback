<?php

namespace Database\Factories;

use App\Models\DepositDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepositDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deposit_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'user_id' => $this->faker->word,
        'value' => $this->faker->randomDigitNotNull,
        'tokens' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

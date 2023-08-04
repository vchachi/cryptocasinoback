<?php

namespace Database\Factories;

use App\Models\CustomerBalanceLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerBalanceLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerBalanceLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'awarded_tokens' => $this->faker->randomDigitNotNull,
        'taken_tokens' => $this->faker->randomDigitNotNull,
        'reason' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

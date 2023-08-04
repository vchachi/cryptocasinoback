<?php

namespace Database\Factories;

use App\Models\WithdrawLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithdrawLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WithdrawLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'withdraw_id' => $this->faker->word,
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

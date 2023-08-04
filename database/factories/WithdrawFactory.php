<?php

namespace Database\Factories;

use App\Models\Withdraw;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithdrawFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Withdraw::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'crypto_id' => $this->faker->word,
        'value' => $this->faker->randomDigitNotNull,
        'tokens' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'confirmed_id' => $this->faker->word,
        'withdraw_address' => $this->faker->word,
        'customer_name' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

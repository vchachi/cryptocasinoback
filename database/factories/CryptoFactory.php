<?php

namespace Database\Factories;

use App\Models\Crypto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crypto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'current_price' => $this->faker->randomDigitNotNull,
        'active' => $this->faker->word,
        'type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

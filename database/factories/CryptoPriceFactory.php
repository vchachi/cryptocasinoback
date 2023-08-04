<?php

namespace Database\Factories;

use App\Models\CryptoPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class CryptoPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CryptoPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'crypto_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'value' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

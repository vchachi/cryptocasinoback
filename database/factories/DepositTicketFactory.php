<?php

namespace Database\Factories;

use App\Models\DepositTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepositTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => $this->faker->word,
        'deposit_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\WithdrawTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithdrawTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WithdrawTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => $this->faker->word,
        'withdraw_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

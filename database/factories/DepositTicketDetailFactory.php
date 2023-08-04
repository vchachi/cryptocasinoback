<?php

namespace Database\Factories;

use App\Models\DepositTicketDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositTicketDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepositTicketDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'datetime' => $this->faker->date('Y-m-d H:i:s'),
        'text' => $this->faker->text,
        'status' => $this->faker->word,
        'confirmation_evidence' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

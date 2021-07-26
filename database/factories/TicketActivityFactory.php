<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => Ticket::factory(),
            'user_id' => User::factory(),
            'message' => $this->faker->sentence(50),
        ];
    }
}

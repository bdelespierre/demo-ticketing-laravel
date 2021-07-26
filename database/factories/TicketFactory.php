<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketActivity;
use App\Models\TicketPriority;
use App\Models\TicketStatus;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $browsers = [
            'Opera',
            'Chrome',
            'FireFox',
            'Edge',
            'Internet Explorer',
        ];

        $os = [
            'Linux',
            'Windows',
            'Mac OS',
        ];

        $types = [
            TicketType::feature(),
            TicketType::bug(),
            TicketType::refactoring(),
        ];

        $statuses = [
            TicketStatus::open(),
            TicketStatus::inProgress(),
            TicketStatus::blocked(),
            TicketStatus::done(),
        ];

        $priorities = [
            TicketPriority::low(),
            TicketPriority::normal(),
            TicketPriority::high(),
        ];

        return [
            'owner_id' => User::factory(),
            'type' => $this->faker->randomElement($types),
            'status' => $this->faker->randomElement($statuses),
            'priority' => $this->faker->randomElement($priorities),
            'title' => $this->faker->text(250),
            'description' => $this->faker->sentence(50),
            'page_url' => $this->faker->url(),
            'browser' => $this->faker->randomElement($browsers),
            'operating_system' => $this->faker->randomElement($os),
        ];
    }
}

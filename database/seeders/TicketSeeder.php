<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketActivity;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::factory()->count(15)->create()->each(function (Ticket $ticket) {
            TicketActivity::factory()->count(mt_rand(3, 12))->make(['ticket_id' => null])->each(
                fn($activity) => $activity->ticket()->associate($ticket)->save()
            );
        });
    }
}

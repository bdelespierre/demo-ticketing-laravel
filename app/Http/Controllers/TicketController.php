<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()
            ->with('activities')
            ->paginate(config('app.default_pagination', 25));

        return view('tickets', compact('tickets'));
    }

    public function create()
    {
        $ticket = app()->environment('local')
            ? Ticket::factory()->make()
            : new Ticket();

        return view('ticket.create', compact('ticket'));
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::make(
            $request->getTicketAttributes()
        );

        $ticket->owner()->associate(
            $request->user()
        );

        $ticket->save();

        return redirect()->route('ticket.show', $ticket);
    }

    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function destroy(Ticket $ticket)
    {
        //
    }
}

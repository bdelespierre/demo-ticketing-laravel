<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Ticket $ticket)
    {
        //
    }

    public function create(User $user)
    {
        return Response::allow();
    }

    public function update(User $user, Ticket $ticket)
    {
        //
    }

    public function delete(User $user, Ticket $ticket)
    {
        //
    }

    public function restore(User $user, Ticket $ticket)
    {
        //
    }

    public function forceDelete(User $user, Ticket $ticket)
    {
        //
    }
}

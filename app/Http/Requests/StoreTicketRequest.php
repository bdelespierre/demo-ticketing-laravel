<?php

namespace App\Http\Requests;

use App\Models\TicketPriority;
use App\Models\TicketType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return optional($this->user())->can('create', Ticket::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $types = [
            (string) TicketType::feature(),
            (string) TicketType::bug(),
            (string) TicketType::refactoring(),
        ];

        $priorities = [
            (string) TicketPriority::low(),
            (string) TicketPriority::normal(),
            (string) TicketPriority::high(),
        ];

        return [
            'ticket.type' => ["required", "string", Rule::in($types)],
            'ticket.priority' => ["required", "string", Rule::in($priorities)],
            'ticket.title' => ["required", "string",],
            'ticket.description' => ["required", "string",],
        ];
    }

    public function getTicketAttributes(): array
    {
        $attributes = $this->input('ticket', []);

        $attributes['type'] = TicketType::fromValue($attributes['type']);
        $attributes['priority'] = TicketPriority::fromValue($attributes['priority']);

        return $attributes;
    }
}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('tickets') }}">Tickets</a> >
            {{ __('New ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('ticket.store') }}">
                    @csrf

                    <div class="flex mb-4">
                        <div class="w-1/2 mr-4">
                            <label class="block" for="input-ticket-type">{{ __('Type') }}<sup>*</sup></label>
                            <select id="input-ticket-type" class="w-full" name="ticket[type]" required>
                                <option value="{{ TicketType::feature() }}" selected>{{ __('Feature') }}</option>
                                <option value="{{ TicketType::bug() }}">{{ __('Bug') }}</option>
                                <option value="{{ TicketType::refactoring() }}">{{ __('Refactoring') }}</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="block" for="input-ticket-priority">{{ __('Priority') }}<sup>*</sup></label>
                            <select id="input-ticket-priority"  class="w-full"name="ticket[priority]" required>
                                <option value="{{ TicketPriority::low() }}">{{ __('Low') }}</option>
                                <option value="{{ TicketPriority::normal() }}" selected>{{ __('Normal') }}</option>
                                <option value="{{ TicketPriority::high() }}">{{ __('High') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block" for="input-ticket-title">{{ __('Title') }}<sup>*</sup></label>
                        <input id="input-ticket-title" class="w-full" type="text" name="ticket[title]" value="{{ $ticket->title }}" required >
                    </div>

                    <div class="mb-4">
                        <label class="block" for="input-ticket-description">{{ __('Description') }}<sup>*</sup></label>
                        <small class="text-gray-400">{{ __('Please describe the best you can the feature you\'d like or the bug your encountered') }}</small>
                        <textarea id="input-ticket-description" class="w-full" rows="7" type="text" name="ticket[description]" value="{{ $ticket->title }}" required>{{ $ticket->description }}</textarea>
                    </div>

                    <button type="submit" class="border p-2">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

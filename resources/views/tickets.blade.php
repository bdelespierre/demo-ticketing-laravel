<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tickets') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('ticket.create') }}">{{ __('Create') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead>
                        <th>#</th>
                        <th class="capitalize">{{ __('Type') }}</th>
                        <th class="capitalize">{{ __('Title') }}</th>
                        <th class="capitalize">{{ __('Status') }}</th>
                        <th class="capitalize">{{ __('Priority') }}</th>
                        <th class="capitalize">{{ __('Last activity') }}</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->type }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->priority }}</td>
                                <td>{{ $ticket->last_activity }}</td>
                                <td><a href="{{ route('ticket.show', $ticket) }}">{{ __('Show') }}</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    {{ __('Empty') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

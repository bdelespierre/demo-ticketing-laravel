<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('tickets') }}">Tickets</a> >
            {{ $ticket->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <div class="w-2/3 p-4 mr-4 bg-white shadow-sm sm:rounded-lg">
                    <h3 class="mb-6 text-lg">{{ __('Activities') }}</h3>

                    @forelse($ticket->activities as $activity)
                        <div class="border-b mb-4 pb-4">
                            <b class="text-gray-400 font-normal">{{ __('User') }}</b>  {{ $activity->user->name }}
                            <p class="mt-2">{{ $activity->message }}
                        </div>
                    @empty
                        <div class="border-b mb-4 pb-4">
                            {{ __('No activity yet.') }}
                        </div>
                    @endforelse
                </div>
                <div class="w-1/3 p-4 bg-white shadow-sm sm:rounded-lg">
                    <h3 class="mb-6 text-lg">{{ __('Details') }}</h3>

                    <div class="border-b mb-4 pb-4">
                        <b class="text-gray-400 font-normal">{{ __('Owner') }}</b> {{ $ticket->owner->name }}
                    </div>

                    <div class="border-b mb-4 pb-4">
                        <p>{{ $ticket->description }}</p>
                    </div>

                    <div class="border-b mb-4 pb-4">
                        <b class="text-gray-400 font-normal">{{ __('URL') }}</b> <a href="{{ $ticket->page_url ?? '#' }}" target="blank">{{ $ticket->page_url ?? 'n/a' }}</a>
                    </div>

                    <div class="border-b mb-4 pb-4">
                        <b class="text-gray-400 font-normal">{{ __('Browser') }}</b> {{ $ticket->browser ?? 'n/a' }}
                    </div>

                    <div class="">
                        <b class="text-gray-400 font-normal">{{ __('Operating System') }}</b> {{ $ticket->operating_system ?? 'n/a' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

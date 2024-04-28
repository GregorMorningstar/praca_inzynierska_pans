<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Przydzielone trasy') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div class="text-white">

<h1>Tutaj beda tylko kierowcy z przydzielonymi trasami</h1>
        @foreach($allocated as $allocation)
            <div>
                <p><strong>Numer zlecenia:</strong> {{ $allocation->order->id }}</p>
                <p><strong>Miejsce załadunku:</strong> {{ $allocation->order->miejsce_zaladunku }}</p>
                <p><strong>Miejsce docelowe:</strong> {{ $allocation->order->miejsce_docelowe }}</p>
                @if($allocation->przyjazd)<p><strong class="text-red-700">Kierowca przybyl na miejsce o {{ $allocation->przyjazd }}</strong> </p>
                @else<h1>kierowca jeszce nie przyjechal na miejsce</h1>@endif
                <p><strong>Kierowca:</strong> {{ $allocation->user->name }}</p>
                <hr>
            </div>
        @endforeach

    </div>
</x-app-layout>

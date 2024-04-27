<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły użytkowanika') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div>
        <form action="{{ route('activeOrdersDriver', ['id' => $myOrder->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $myOrder->id }}">
            <select name="driver_id" class="form-control">
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-3">Wybierz kierowcę</button>
        </form>
    </div>
</x-app-layout>

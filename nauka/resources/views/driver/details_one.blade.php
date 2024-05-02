<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły zlecenia Drivera') }}
        </h2>

        @include('driver.nav.sidebarDriver')
    </x-slot>
    <div>
        <h1 class="text-white">tutaj beda szczegóły zlecenia dla zlecenia o id {{$orderId}}
        </h1>
    </div>

    {{dd($orderData)}}

</x-app-layout>



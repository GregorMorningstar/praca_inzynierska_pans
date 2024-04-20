<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5 bg-center">
            {{ __('Szczegóły użytkowanika') }}
        </h2>

        @include('forwarder.nav.sidebarForwarder')
    </x-slot>
    <div>
      {{dd($assing->id)}}
    </div>
</x-app-layout>








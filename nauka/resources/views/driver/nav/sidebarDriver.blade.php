<div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-start items-center" style="margin-left: 20px;">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" class="ml-4">
                {{ __('Lista zlecen') }}
            </x-nav-link>
            <x-nav-link :href="route('user.add')" :active="request()->routeIs('user.add')" class="ml-4">
                {{ __('Aktywne zlecenia') }}
            </x-nav-link>
            <x-nav-link :href="route('user.show')" :active="request()->routeIs('user.show')" class="ml-4">
                {{ __('Historia Zlecen') }}
            </x-nav-link>

        </div>
    </div>
</div>

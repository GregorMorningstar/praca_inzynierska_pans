<div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-start items-center" style="margin-left: 20px;">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('driver.index')" :active="request()->routeIs('driver.index')" class="ml-4">
                {{ __('Lista zlecen') }}
            </x-nav-link>

        </div>
    </div>
</div>

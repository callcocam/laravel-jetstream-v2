<div class="pt-4 pb-1 border-t border-gray-200">
    <div class="flex items-center px-4">
        <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ __('Menu Settings') }}</div>
        </div>
    </div>

    <div class="mt-3 space-y-1">
        <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Menu Type') }}
        </div>

        <x-jet-responsive-nav-link href="{{ route('menu-types.index') }}">
            {{ __('Menu types') }}
        </x-jet-responsive-nav-link>

        <div class="border-t border-gray-100"></div>

        <!-- Menu Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Menu') }}
        </div>

        <!-- Team Settings -->
        <x-jet-responsive-nav-link href="{{ route('menus.index') }}">
            {{ __('Menus') }}
        </x-jet-responsive-nav-link>

        <x-jet-responsive-nav-link href="{{ route('sub-menus.index') }}">
            {{ __('Sub Menus') }}
        </x-jet-responsive-nav-link>


        <div class="border-t border-gray-100"></div>

        <!-- Team Switcher -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Switch Tenants') }}
        </div>

        @foreach (\App\Tasks\LoadTenantsTask::make() as $tenant)
            <x-land-switchable-tenant :tenant="$tenant" />
        @endforeach

        <div class="border-t border-gray-100"></div>
    </div>
</div>

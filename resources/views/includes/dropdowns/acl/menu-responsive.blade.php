<div class="pt-4 pb-1 border-t border-gray-200">
    <div class="flex items-center px-4">
        <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ __('Action Control List') }}</div>
        </div>
    </div>

    <div class="mt-3 space-y-1">
        <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Permissions') }}
        </div>

        <x-jet-responsive-nav-link href="{{ route('permissions.index') }}">
            {{ __('Permissions') }}
        </x-jet-responsive-nav-link>

        <div class="border-t border-gray-100"></div>

        <!-- Menu Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Roles') }}
        </div>

        <!-- Team Settings -->
        <x-jet-responsive-nav-link href="{{ route('roles.index') }}">
            {{ __('Roles') }}
        </x-jet-responsive-nav-link>

        <div class="border-t border-gray-100"></div>

        <!-- Team Switcher -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manege Users') }}
        </div>

        <x-jet-responsive-nav-link href="{{ route('users.index') }}">
            {{ __('Users') }}
        </x-jet-responsive-nav-link>

        <div class="border-t border-gray-100"></div>
    </div>
</div>

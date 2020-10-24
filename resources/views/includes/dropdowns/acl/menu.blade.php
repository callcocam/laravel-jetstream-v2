<x-jet-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
            <div>{{ __("Action Control List") }}</div>

            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Permissions') }}
        </div>

        <x-jet-dropdown-link href="{{ route('permissions.index') }}">
            {{ __('Permissions') }}
        </x-jet-dropdown-link>

        <div class="border-t border-gray-100"></div>

        <!-- Menu Management -->
           <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Roles') }}
            </div>

            <!-- Team Settings -->
            <x-jet-dropdown-link href="{{ route('roles.index') }}">
                {{ __('Roles') }}
            </x-jet-dropdown-link>

            <div class="border-t border-gray-100"></div>

            <!-- Team Switcher -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manege Users') }}
            </div>

        <x-jet-dropdown-link href="{{ route('users.index') }}">
            {{ __('Users') }}
        </x-jet-dropdown-link>

            <div class="border-t border-gray-100"></div>
    </x-slot>
</x-jet-dropdown>

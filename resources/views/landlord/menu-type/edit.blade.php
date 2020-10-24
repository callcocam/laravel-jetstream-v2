<x-landlord-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('landlord.menu-type.edit-component', ['rows' => $rows])
                <x-jet-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('landlord.menu-type.delete-component', ['rows' => $rows])
                </div>
        </div>
    </div>
</x-landlord-layout>

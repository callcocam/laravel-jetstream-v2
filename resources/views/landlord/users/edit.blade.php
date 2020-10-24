<x-landlord-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('landlord.role.edit-component', ['rows' => $rows])
            @if($rows->special!="all-access")
            <x-jet-section-border />
             @livewire('landlord.role.manage-permission-component', ['rows' => $rows])
            @endif
                <x-jet-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('landlord.role.delete-component', ['rows' => $rows])
                </div>
        </div>
    </div>
</x-landlord-layout>

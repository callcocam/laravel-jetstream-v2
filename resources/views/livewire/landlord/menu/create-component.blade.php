<x-jet-form-section submit="createItem">
    <x-slot name="title">
        {{ __('Role Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The rows\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Menu Name') }}" />
            <x-jet-input id="name"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.name"/>
            <x-jet-input-error for="name" class="mt-2" />


            <x-jet-label for="route" value="{{ __('Menu Route') }}" />
            <x-jet-input id="route"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.route" />
            <x-jet-input-error for="route" class="mt-2" />

            <x-jet-label for="url" value="{{ __('Menu url') }}" />
            <x-jet-input id="url"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.url" />
            <x-jet-input-error for="url" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

<x-jet-form-section submit="updateItem">
    <x-slot name="title">
        {{ __('Menu Name') }}
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

            <x-jet-label for="slug" value="{{ __('Menu Slug') }}" />
            <x-jet-input id="slug"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.slug" />

            <x-jet-input-error for="slug" class="mt-2" />
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

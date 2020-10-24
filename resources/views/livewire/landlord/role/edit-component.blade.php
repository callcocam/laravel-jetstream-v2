<div>
    <x-tb-loading/>
    <x-jet-form-section submit="updateItem">

        <x-slot name="title">
            {{ __('Role Name') }}
        </x-slot>

        <x-slot name="description">
            {{ __('The rows\'s name and owner information.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Role Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Role Name') }}" />
                <x-jet-input id="name"
                             type="text"
                             class="mt-1 block w-full"
                             wire:model.defer="state.name"/>
                <x-jet-input-error for="name" class="mt-2" />
                <div class="mt-4">
                    <span class="text-gray-700">{{ __("Access") }}</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" id="special-no-defined" name="special" value="partial-access" wire:model.defer="state.special">
                            <span class="ml-2">{{ __('Partial Access') }}</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" id="special-all-access" name="special" value="all-access" wire:model.defer="state.special">
                            <span class="ml-2">{{ __('Access Total') }}</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" id="special-no-access" name="special" value="no-access" wire:model.defer="state.special" >
                            <span class="ml-2">{{ __('No Access') }}</span>
                        </label>
                    </div>
                </div>
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
</div>

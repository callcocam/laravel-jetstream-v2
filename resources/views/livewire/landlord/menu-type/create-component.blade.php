<div>
{{--    @if (Gate::check('createItem', $rows))--}}
        <x-jet-section-border />
        <div class="mt-10 sm:mt-0">
            <x-jet-form-section submit="createItem">
                <x-slot name="title">
                    {{ __('Adicionar menu') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Adicionar um novo tipo de menu') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <div class="max-w-xl text-sm text-gray-600">
                            {{ __('Por favor forneça um nome para o tipo menu que será usado como chave para a criação de menus para os inquilinos, tanto no admin com no site') }}
                        </div>
                    </div>

                    <!-- Member Email -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
                        <x-jet-input-error for="name" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Adicionado.') }}
                    </x-jet-action-message>

                    <x-jet-button>
                        {{ __('Adicionar') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
        </div>
{{--    @endif--}}
</div>

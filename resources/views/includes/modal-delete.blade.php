<x-jet-confirmation-modal wire:model="confirmingRemoval">
    <x-slot name="title">
        {{ __('Delete Team') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted.') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingRemoval')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteItem" wire:loading.attr="disabled">
            {{ __('Delete Item') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>

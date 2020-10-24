<div>
    <x-tb-loading/>
    <!-- Add Role -->
    @livewire('landlord.role.create-component', ['rows' => []])
    @if ($models)
        <x-jet-section-border />
        <!-- Manage Team Members -->
        <div class="mt-10 sm:mt-0">
            <x-jet-action-section>
                <x-slot name="title">
                    {{ __('Papéis do sistema') }}
                </x-slot>
                <x-slot name="description">
                    {{ __('Todas os papéis que fazem parte do sistema.') }}
                </x-slot>
                <!-- Team Member List -->
                <x-slot name="content">
                    <x-tb-table>
                        <x-slot name="search">
                            <x-tb-search search="search"/>
                        </x-slot>
                        <x-slot name="thead">
                            <tr>
                                @include(table_views_includes(), compact('columns'))
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @include(table_views_includes("_body"), compact('columns'))
                        </x-slot>
                        <x-slot name="paginate">
                            {{ $models->links() }}
                        </x-slot>
                    </x-tb-table>
                </x-slot>
            </x-jet-action-section>
        </div>
        <!-- Delete Team Confirmation Modal -->
        @include('includes.modal-delete')
    @endif
</div>

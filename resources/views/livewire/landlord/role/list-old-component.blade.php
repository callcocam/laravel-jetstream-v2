<div>
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
                    <div class="space-y-6">
                        <x-tb-table>
                            <x-slot name="search">
                              <x-tb-search updatesQueryString="updatesQueryString"/>
                            </x-slot>
                            <x-slot name="thead">
                                <tr>
                                    @foreach($columns as $column)
                                        @include(table_view(sprintf('thead.%s', $column->type)), $column->attributes())
                                    @endforeach
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach ($models as $model)
                                    <tr>
                                        @foreach($columns as $column)
                                            @include(table_view($column->type),['value'=>$model->{$column->name}])
                                        @endforeach
                                    </tr>
                                @endforeach
                            </x-slot>
                            <x-slot name="paginate">
                                {{ $models->links() }}
                            </x-slot>
                        </x-tb-table>
                    </div>
                </x-slot>
            </x-jet-action-section>
        </div>
        <!-- Delete Team Confirmation Modal -->
        @include('includes.modal-delete')
    @endif
</div>

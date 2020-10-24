<div>
    <!-- Add Team Member -->
    @if($menu_type_id)
        @livewire('landlord.menu.create-component', ['rows' => []])
    @else
        <x-alert-toast message="Selecione um tipo de menu para cadastrar novos menus"/>
    @endif
    @if ($this->load())
        <x-jet-section-border />
        <!-- Manage Team Members -->
        <div class="mt-10 sm:mt-0">
            <x-jet-action-section>
                <x-slot name="title">
                    {{ __('Tipos de menus') }}
                    @if(isset($menu_type_id))
                        - ( {{  $this->builder()->name }} )
                    @endif
                </x-slot>
                <x-slot name="description">
                    @if($menuTypes)
                        <ul class="list-none ml-5">
                            @foreach($menuTypes as $type)
                                <li class=" {{ isset($menu_type_id) && $type->id == $menu_type_id ? 'border-l border-gray-400' : 'border-b border-gray-100' }}">
                                    <x-jet-dropdown-link href="" wire:click.prevent="$set('menu_type_id','{{$type->id}}')" >
                                        {{ __($type->name) }}
                                    </x-jet-dropdown-link>
                                </li>
                            @endforeach
                        </ul>
                    @endif
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

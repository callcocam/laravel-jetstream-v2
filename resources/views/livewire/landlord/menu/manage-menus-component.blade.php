<div>
    <x-tb-loading/>
    <x-jet-form-section submit="updateItem">
        <x-slot name="title">
            {{ __('Tipos de menus') }}
        </x-slot>
        <x-slot name="description">

        </x-slot>
        <x-slot name="form">
            <!-- Team Name -->
            <div class="col-span-12">
                <!-- component -->
                <div class="relative w-full bg-white shadow" id="search-content">
                    <x-tb-search search="search"/>
                </div>
                <div class="">
                    <div class="col-span-12 lg:col-span-4">
                        <div class="mt-1 border border-gray-200 rounded-lg cursor-pointer">
                            @foreach($models as $index => $menu_type)
                                <div class="px-4 py-3 {{ $index > 0 ? 'border-t border-gray-200' : '' }}"
                                     wire:click="addMenuType('{{ $menu_type->id }}')">
                                    <div class="{{ $addMenuTypeForm && in_array($menu_type->id,$addMenuTypeForm) ? 'opacity-50' : '' }}">
                                        <!-- Role Name -->
                                        <div class="flex items-center">
                                            <div class="text-sm text-gray-600 {{ in_array($menu_type->id,$addMenuTypeForm) ? 'font-semibold' : '' }}">
                                                {{ $menu_type->name }}
                                            </div>
                                            @if (in_array($menu_type->id,$addMenuTypeForm))
                                                <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                        </div>
                                        <!-- Role Description -->
                                        <div class="mt-2 text-xs text-gray-600">
                                            {{ $menu_type->description }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-jet-form-section>
</div>

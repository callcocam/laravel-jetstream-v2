<div>
    <x-tb-loading/>
    <x-jet-form-section submit="updateItem">
        <x-slot name="title">
            {{ __('Permissions Groups') }}- <b>{{$filterGroups[$groups]}}</b>
        </x-slot>
        <x-slot name="description">
            <ul class="list-none ml-5">
                @foreach($filterGroups as $group=>$label)
                    <li class=" {{ $group == $groups ? 'border-l border-gray-400' : 'border-b border-gray-100' }}">
                        <x-jet-dropdown-link href="" wire:click.prevent="$set('groups','{{$group}}')" >
                            {{ __($label) }}
                        </x-jet-dropdown-link>
                    </li>
                @endforeach
            </ul>
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
                                @foreach($models as $index => $permission)
                                    <div class="px-4 py-3 {{ $index > 0 ? 'border-t border-gray-200' : '' }}"
                                         wire:click="addPermission('{{ $permission->slug }}')">
                                        <div class="{{ $addPermissionForm && in_array($permission->slug,$addPermissionForm) ? 'opacity-50' : '' }}">
                                            <!-- Role Name -->
                                            <div class="flex items-center">
                                                <div class="text-sm text-gray-600 {{ in_array($permission->slug,$addPermissionForm) ? 'font-semibold' : '' }}">
                                                    {{ $permission->name }}
                                                </div>
                                                @if (in_array($permission->slug,$addPermissionForm))
                                                    <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                @endif
                                            </div>
                                            <!-- Role Description -->
                                            <div class="mt-2 text-xs text-gray-600">
                                                {{ $permission->description }}
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

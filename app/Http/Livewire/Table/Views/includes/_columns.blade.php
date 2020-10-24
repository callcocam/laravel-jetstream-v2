@if($checkbox && $checkboxLocation === 'left')
    @include(table_views_includes('_checkbox-all'))
@endif
@foreach($columns as $header)
    @if(!$header->hidden)
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
            @if($header->sortable)
                <span style="cursor: pointer;" wire:click="sort('{{ $header->name }}')">
                    {{ $header->text }}
                    @if ($column !== $header->name)
                        <i class="text-muted fas fa-sort"></i>
                    @elseif ($direction === 'asc')
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="display: unset;">
                        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                    </svg>
                    @else
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="display: unset;">
                            <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                        </svg>
                    @endif
                </span>
            @else
                {{ $header->text }}
            @endif
        </th>
    @endif
@endforeach
@if($checkbox && $checkboxLocation === 'right')
    @include(table_views_includes('_checkbox-all'))
@endif

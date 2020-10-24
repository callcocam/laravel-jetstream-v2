@if($models->isEmpty()){{-- Primeiro if  --}}
<tr><td colspan="{{ collect($columns)->count() }}">{{ $noResultsMessage }}</td></tr>
@else {{--  Primeiro else --}}
@foreach($models as $model){{-- Open foreach row  --}}
<tr>
    @if($checkbox && $checkboxLocation === 'left')
        @include(table_views_includes('_checkbox-row'))
    @endif
    @foreach($columns as $column){{-- Open foreach column --}}
    @if(!$column->hidden)
        @if ($column->hasComponents())
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <div class="text-sm leading-5 text-blue-900">
                        @foreach($column->getComponents() as $component)
                            @if (! $component->isHidden())
                                @include($component->view(), ['model' => $model, 'attributes' => $component->getAttributes(), 'options' => $component->getOptions()])
                            @endif
                        @endforeach
                    </div>
                </td>
        @else
            @if (isset($column->html) && $column->html  )
                @if ($column->isCustomAttribute())
                    @include(table_view('text'), ['text' => new \Illuminate\Support\HtmlString($model->{$column->name})])
                @else
                    @include(table_view('text'), ['text' => new \Illuminate\Support\HtmlString(Arr::get($model->toArray(), $column->name))])
                @endif
            @elseif ($column->isView())
                @include($column->view, [$column->getViewModelName() => $model])
            @else
                @if ($column->isCustomAttribute())
                    @include(table_view('text'), ['text' => $model->{$column->name}])
                @else
                    @include(table_view('text'), ['text' => Arr::get($model->toArray(), $column->name)])
                @endif
            @endif
        @endif
    @endif
    @endforeach {{-- Close foreach column  --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include(table_views_includes('_checkbox-row'))
    @endif
</tr>
@endforeach{{-- Close foreach row --}}
@endif{{-- Fim do primeiro if & else  --}}

<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
    @if ($column->hasComponents())
        @if($column->componentsAreHiddenForModel($model))
            @if($message = $column->componentsHiddenMessageForModel($model))
                {{ $message }}                                    &nbsp;
            @endif
        @else
            @foreach($column->getComponents() as $component)
                @if (! $component->isHidden())
                    @include($component->view(), ['model' => $model, 'attributes' => $component->getAttributes(), 'options' => $component->getOptions()])
                @endif
            @endforeach
        @endif
    @else
        @if (isset($column->html) && $column->html  )
            @if ($column->isCustomAttribute())
                {{ new \Illuminate\Support\HtmlString($model->{$column->name}) }}
            @else
                {{ new \Illuminate\Support\HtmlString(Arr::get($model->toArray(), $column->name)) }}
            @endif
        @else
            @if ($column->isCustomAttribute())
                {{ $model->{$column->name} }}
            @else
                {{ Arr::get($model->toArray(), $column->name) }}
            @endif
        @endif
    @endif
</th>

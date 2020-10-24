<button
    @foreach ($attributes as $key => $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    wire:click="confirmRemoval('{{ $model->id }}')">
    @if (array_key_exists('icon', $options))
    <i class="{{ $options['icon'] }}"></i>
    @endif
     {{ $options['text'] ?? '' }}
</button>

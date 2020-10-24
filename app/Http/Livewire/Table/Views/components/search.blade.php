<div class="relative w-full bg-white shadow" id="search-content">
    <div class="container mx-auto py-4 text-black">
        <input wire:model.debounce.500ms="search" type="search" placeholder="Buscar..." autofocus="autofocus" class="w-full text-grey-800 transition focus:outline-none focus:border-transparent p-2 appearance-none leading-normal text-xl lg:text-2xl">
    </div>
</div>

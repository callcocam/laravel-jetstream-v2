<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-jet-nav-link href="{{ x_route('dashboard') }}" :active="routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>
    @if($menus)
        @foreach($menus as $menu)
            <x-jet-nav-link href="{{ x_route('roles') }}" :active="routeIs('roles')">
                {{ __($menu->name) }}
            </x-jet-nav-link>
        @endforeach
    @endif
</div>

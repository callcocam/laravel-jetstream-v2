<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-jet-responsive-nav-link href="{{ x_route('dashboard') }}" :active="routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-jet-responsive-nav-link>
    </div>
    @include('includes.dropdowns.acl.menu-responsive')
    @include('includes.dropdowns.menus.menu-responsive')
    <!-- Responsive Settings Options -->

    @include('includes.account-management')
</div>

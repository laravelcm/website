@if ($menu = Menus::getMenu($name))

    @if ($menu->menulinks->count() > 0)
        <ul class="main-menu menu-{{ $name }}-list {{ $menu->class }}" role="menu">
            @foreach ($menu->menulinks as $menulink)
                @include('menus::public._itemHeader')
            @endforeach
            {{--@section('lang-switcher')
                @include('core::public._lang-switcher')
            @show--}}
        </ul>
    @endif

@endif

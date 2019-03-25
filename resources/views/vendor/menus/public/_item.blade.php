<li class="menu-{{ $name }}-item menu-{{ $name }}-item-{{ $menulink->id }} {{ $menulink->class }}" id="menuitem_{{ $menulink->id }}" role="menuitem">
    <a class="menu-{{ $name }}-link {{ $menulink->items->count() > 0 ? 'dropdown-toggle' : '' }}" href="{{ url($menulink->href) }}" @if ($menulink->target === '_blank') target="_blank" rel="noopener noreferrer" @endif @if ($menulink->items->count() > 0) data-toggle="dropdown" @endif>
        @if ($menulink->icon_class)
            <span class="{{ $menulink->icon_class }}"></span>
        @endif
        {{ $menulink->title }}
    </a>
    @if ($menulink->items->count() > 0)
        <ul class="menu-{{ $name }}-dropdown dropdown-menu">
            @foreach ($menulink->items as $menulink)
                @include('menus::public._item', ['menulink' => $menulink])
            @endforeach
        </ul>
    @endif
</li>

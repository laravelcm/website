<li class="kt-menu__item @if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($active) kt-menu__item--active @endif @if($item->hasItems()) kt-menu__item--submenu @endif @if($active && $item->hasItems()) kt-menu__item--open kt-menu__item--here @endif" aria-haspopup="true" @if($item->hasItems()) {{ 'data-ktmenu-submenu-toggle="hover"' }} @endif>
    <a href="{{ $item->getUrl() }}" class="kt-menu__link @if(count($appends) > 0) hasAppend @endif @if(count($items) > 0) kt-menu__toggle @endif" @if($item->getNewTab())target="_blank"@endif>
        <i class="{{ $item->getIcon() }}">
            @foreach($appends as $append)
                {!! $append !!}
            @endforeach
        </i>
        <span class="kt-menu__link-text">{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        @if($item->hasItems())<i class="{{ $item->getToggleIcon() }}"></i>@endif
    </a>

    @if(count($items) > 0)
        <div class="kt-menu__submenu">
            <span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">
                @foreach($items as $item)
                    {!! $item !!}
                @endforeach
            </ul>
        </div>
    @endif
</li>

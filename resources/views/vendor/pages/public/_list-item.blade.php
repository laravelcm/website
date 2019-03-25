<li class="pages-item {{ Request::is($child->uri()) ? 'active' : '' }}" id="page_{{ $child->id }}">
    <a class="pages-item-link" href="{{ url($child->uri()) }}">
        {{ $child->title }}
    </a>
    @if ($child->items)
        <ul class="pages-item-children">
            @foreach ($child->items as $childPage)
                @include('pages::public._list-item', ['child' => $childPage])
            @endforeach
        </ul>
    @endif
</li>

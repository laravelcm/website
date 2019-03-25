<li class="forums-item">
    <a class="forums-item-link" href="{{ $forum->uri() }}" title="{{ $forum->title }}">
        <span class="forums-item-title">{!! $forum->title !!}</span>
        <span class="forums-item-image">{!! $forum->present()->thumb(null, 200) !!}</span>
    </a>
</li>

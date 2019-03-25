<article class="card" itemscope itemtype="http://schema.org/Article">
    <div class="card__thumb">
        {!! $tutorial->present()->thumb(350, 150) !!}
    </div>
    <div class="card__content">
        <span class="card__content--date">{{ $tutorial->created_at->format('M d, Y') }}</span>
        <h4 class="card__content--title">
            <a href="{{ $tutorial->uri() }}" title="{{ $tutorial->title }}">{{ $tutorial->title }}</a>
        </h4>
        <ul class="card__links">
            <li class="view_link">
                <i class="fa fa-eye"></i> {{ $tutorial->getViews().' '. __('views') }}
            </li>
        </ul>
    </div>
</article>

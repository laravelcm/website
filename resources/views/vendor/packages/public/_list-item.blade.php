<article class="card" itemscope itemtype="http://schema.org/Article">
    <div class="card__thumb">
        {!! $package->present()->thumb(350, 150) !!}
    </div>
    <div class="card__content">
        <span class="card__content--date">{{ $package->created_at->format('M d, Y') }}</span>
        <h4 class="card__content--title">
            <a href="{{ $package->uri() }}" title="{{ $package->title }}">{{ $package->title }}</a>
        </h4>
        <p class="card__content--summary" itemprop="headline">{{ str_limit($package->summary, 130) }}</p>
        <ul class="card__links">
            <li class="view_link">
                <i class="fa fa-eye"></i> {{ $package->getViews().' '. __('views') }}
            </li>
        </ul>
    </div>
</article>

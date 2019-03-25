<article class="card" itemscope itemtype="http://schema.org/Article">
    <div class="card__thumb">
        {!! $news->present()->thumb(540, 400) !!}
        <meta itemprop="image" content="{{ $news->present()->thumbUrl() }}">
    </div>
    <div class="card__content">
        <time class="card__content--date" itemprop="datePublished" datetime="{{ $news->date->toIso8601String() }}">{{ $news->present()->dateLocalized }}</time>
        <h4 class="card__content--title">
            <a href="{{ $news->uri() }}" itemprop="url">{{ $news->title }}</a>
        </h4>
        <p class="card__content--summary" itemprop="headline">{{ str_limit($news->summary, 130) }}</p>
        <ul class="card__links">
            <li class="view_link">
                <i class="fa fa-eye"></i> {{ $news->getViews() }} {{ __('views') }}
            </li>
            <li class="read_link">
                <a href="{{ $news->uri() }}">@lang('db.Read More')</a>
            </li>
        </ul>
    </div>
</article>

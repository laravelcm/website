<div class="col-sm-12 col-md-4" itemscope itemtype="http://schema.org/Event">
    <div class="event">
        <div class="event__thumb">
            {!! $event->present()->thumb(350, 150) !!}
        </div>
        <div class="event__content">
            <span class="event__content-date">{!! $event->present()->dateFromTo !!}</span>
            <h6 class="event__content-title">
                <a href="{{ $event->uri() }}" itemprop="url">{{ $event->title }}</a>
            </h6>
        </div>
    </div>
</div>

<ul class="partners__list owl-carousel" id="partners_carousel">
    @foreach ($items as $partner)
        @include('partners::public._list-item')
    @endforeach
</ul>

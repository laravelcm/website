@if ($model->images->count() > 0)
    <ul class="images-list">
    @foreach ($model->images as $image)
        <li class="images-list-item">
            <a class="images-list-image"
                href="{!! $image->present()->thumbSrc(1200, 1200, ['resize']) !!}"
                data-caption="{{ $image->alt_attribute }}"
                data-fancybox="{{ $model->slug ? : 'group' }}"
                data-options='{ "buttons": ["close"], "infobar": false }'
            >
                <img class="images-list-image-thumb" src="{!! $image->present()->thumbSrc(370, 370) !!}" alt="{{ $image->alt_attribute }}">
            </a>
        </li>
    @endforeach
    </ul>
@endif

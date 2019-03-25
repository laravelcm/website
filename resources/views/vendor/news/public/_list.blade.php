<div class="grid-2">
    @foreach ($items as $news)
        @include('news::public._list-item')
    @endforeach
</div>

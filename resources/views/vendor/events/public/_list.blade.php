<div class="row">
    @foreach ($items as $event)
        @include('events::public._list-item')
    @endforeach
</div>

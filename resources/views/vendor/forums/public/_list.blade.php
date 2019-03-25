<ul class="forums-list">
    @foreach ($items as $forum)
    @include('forums::public._list-item')
    @endforeach
</ul>

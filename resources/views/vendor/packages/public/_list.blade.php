<div class="grid-3">
    @foreach ($items as $package)
        @include('packages::public._list-item')
    @endforeach
</div>

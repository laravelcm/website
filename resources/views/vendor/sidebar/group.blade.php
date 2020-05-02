@if($group->shouldShowHeading())
    <h2 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">{{ $group->getName() }}</h2>
@endif

<div class="space-y-2">
    @foreach($items as $item)
        {!! $item !!}
    @endforeach
</div>

<a
    href="{{ $item->getUrl() }}"
    class="mt-2 -mx-3 px-3 py-2 flex items-center justify-between text-sm font-medium hover:bg-gray-200 rounded-lg @if($item->getItemClass()){{ $item->getItemClass() }}@endif @if($active) bg-gray-200 @endif"
    @if($item->getNewTab())target="_blank"@endif
>
    <span class="inline-flex items-center">
        {!! $item->getIcon() !!}
        <span class="ml-2 @if($active) text-gray-900 @else text-gray-700 @endif">{{ $item->getName() }}</span>
    </span>

    @foreach($badges as $badge)
        {!! $badge !!}
    @endforeach
</a>

@if ($paginator->hasPages())

    <ul class="kt-pagination__links">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="kt-pagination__link--next">
                <a href="javascript:;" class="disabled" role="button" aria-disabled="true"><i class="fa fa-angle-left"></i></a>
            </li>
        @else
            <li class="kt-pagination__link--first">
                <a href="{{ $paginator->toArray()['first_page_url'] }}"><i class="fa fa-angle-double-left"></i></a>
            </li>
            <li class="kt-pagination__link--next">
                <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <a href="javascript:;">{{ $element }}</a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="kt-pagination__link--active">
                            <a href="javascript:;">{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="kt-pagination__link--prev disabled">
                <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
            </li>
            <li class="kt-pagination__link--last">
                <a href="{{ $paginator->toArray()['last_page_url'] }}"><i class="fa fa-angle-double-right"></i></a>
            </li>
        @else
            <li class="kt-pagination__link--prev disabled">
                <a href="javascript:;" class="disabled"><i class="fa fa-angle-right"></i></a>
            </li>
        @endif
    </ul>
@endif

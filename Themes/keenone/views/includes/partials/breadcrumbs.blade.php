@if($breadcrumbs->isNotEmpty())
    <div class="kt-subheader__main">
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            @foreach($breadcrumbs as $breadcrumb)
                @if($breadcrumb->url && !$loop->last)
                    <a href="{{ $breadcrumb->url }}" class="kt-subheader__breadcrumbs-link">{{ $breadcrumb->title }}</a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                @else
                    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">{{ $breadcrumb->title }}</span>
                @endif
            @endforeach
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            @yield('breadcrumb-links')
        </div>
    </div>
@endif

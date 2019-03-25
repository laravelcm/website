@extends('pages::public.master')

@section('page')

    @if ($children)
    <ul class="nav nav-subpages">
        @foreach ($children as $child)
        @include('pages::public._list-item', ['child' => $child])
        @endforeach
    </ul>
    @endif

    {!! $page->present()->body !!}

    @include('files::public._documents', ['model' => $page])
    @include('files::public._images', ['model' => $page])

    @foreach ($page->publishedSections as $section)
        <div id="{{ $section->position.'-'.$section->slug }}">
        {!! $section->present()->body !!}
        </div>
    @endforeach

@endsection

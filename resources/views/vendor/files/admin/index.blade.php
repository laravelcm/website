@extends('core::admin.master')

@section('title', __('Files'))

@section('content')

<filepicker :modal="false"></filepicker>

@endsection

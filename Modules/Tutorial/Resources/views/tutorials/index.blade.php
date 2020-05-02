@extends('layouts.master')
@section('title', "Listing des tutoriels")

@section('content')

    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">{{ __('Tutoriels') }}</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <span class="shadow-sm rounded-md">
              <a href="{{ route('admin.tutorials.create') }}" class="btn btn-primary inline-flex items-center transition duration-150 ease-in-out">
                {{ __('Ajouter un tutoriel') }}
              </a>
            </span>
        </div>
    </div>

    @livewire('tutorial-list')

@endsection

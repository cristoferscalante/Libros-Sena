@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Dashboard') }}</h2>

        @if (session('status'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded">
                {{ session('status') }}
            </div>
        @endif

        <p class="text-gray-700">{{ __('You are logged in!') }}</p>
    </div>
</div>
@endsection

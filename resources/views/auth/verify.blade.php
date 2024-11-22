@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('Verify Your Email Address') }}</h2>

        @if (session('resent'))
            <div class="mb-4 text-green-600 text-sm text-center">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="text-gray-700 text-sm mb-4">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>
        <p class="text-gray-700 text-sm mb-6">
            {{ __('If you did not receive the email') }},
        </p>

        <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
            @csrf
            <button type="submit" 
                class="text-blue-600 hover:underline focus:outline-none focus:ring focus:ring-blue-300">
                {{ __('click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection

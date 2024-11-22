@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-[#383838]">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg px-8 py-6">
            
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           required autocomplete="email" autofocus
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                    
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                    
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-sm text-gray-600">
                            {{ __('Recordar') }}
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" 
                            class="w-full py-3 px-6 bg-[#000] text-white rounded-full shadow-md hover:bg-[#151515] focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ __('Iniciar sección') }}
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-4">
                        <a href="{{ route('password.request') }}" class="text-sm text-[#151515] hover:underline">
                            {{ __('Recuperar contraseña?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

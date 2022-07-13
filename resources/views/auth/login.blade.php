<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="flex items-center justify-center mt-3">
                <span class="text-lg text-gray-600 inline-flex items-center ml-4">
                    Todo App
                </span>
                <a href="/">
                    <img id="logoo" src="img/todo.png" style="width: 60px;height:60px;">
                </a>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <!-- <button class="inline-flex items-center px-6 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-md mx-2">
                    Restore
                </button> -->
                <x-button class="inline-flex items-center px-6 py-2 bg-gray-900 hover:bg-gray-600 text-white font-medium rounded-md mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-snoweb svg-theme-dark" x="0" y="0" width="25px" height="25px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
                        <defs>
                            <style>
                                .svg-fill-primary {
                                    fill: #FFF;
                                }

                                .svg-fill-secondary {
                                    fill: #65CDAE;
                                }

                                .svg-fill-tertiary {
                                    fill: #37A987;
                                }

                                .svg-stroke-primary {
                                    stroke: #FFF;
                                }

                                .svg-stroke-secondary {
                                    stroke: #65CDAE;
                                }

                                .svg-stroke-tertiary {
                                    stroke: #37A987;
                                }
                            </style>
                        </defs>
                        <path d="M22.8,22.8a3.9,3.9,0,0,1,3.9,3.9V73.3a3.9,3.9,0,1,1-7.8,0V26.7A3.9,3.9,0,0,1,22.8,22.8ZM52.7,35.6a3.8,3.8,0,0,1,0,5.5l-5,5H77.2a3.9,3.9,0,0,1,0,7.8H47.7l5,5a3.8,3.8,0,0,1,0,5.5,3.8,3.8,0,0,1-5.4,0L35.6,52.7a3.9,3.9,0,0,1,0-5.4L47.3,35.6A3.8,3.8,0,0,1,52.7,35.6Z" class="svg-fill-primary" fill-rule="evenodd" />
                    </svg>
                    {{ __('Log in') }}
                </x-button>
            </div>
            <hr style="margin-top: 10px;">
            <div class="flex items-center justif-center mt-3" style="justify-content: center;">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>

            <hr style="margin-top:15px;border-top: 3px solid;">

        </form>
        <form action="{{route('register')}}" method="GET">
            @csrf
            <div class="flex items-center justify-center mt-3">
                <span class="text-sm text-gray-600 inline-flex items-center">Don't have an account?
                </span>
                <x-button id="register" class="ml-2">Register</x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
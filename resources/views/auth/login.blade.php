<x-guest-layout>

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Welcome</h1>
        <p class="text-gray-500 text-sm mt-2">Silakan login ke akun Anda</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-blue-600 hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Button Login -->
        <button type="submit"
            class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
            Log in
        </button>

        <!-- Register Link -->
        <div class="text-center mt-4">
            <span class="text-sm text-gray-600">
                Belum punya akun?
            </span>
            <a href="{{ route('register') }}"
               class="text-sm text-blue-600 hover:underline font-medium">
                Daftar di sini
            </a>
        </div>

    </form>

</x-guest-layout>
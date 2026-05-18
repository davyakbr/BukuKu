<x-guest-layout>

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Create Account</h1>
        <p class="text-gray-500 text-sm mt-2">
            Silakan daftar untuk membuat akun baru
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password"
                name="password"
                required
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password"
                name="password_confirmation"
                required
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
            Register
        </button>

        <!-- Login Link -->
        <div class="text-center">
            <a href="{{ route('login') }}"
               class="text-sm text-blue-600 hover:underline">
                Sudah punya akun? Login
            </a>
        </div>

    </form>

</x-guest-layout>
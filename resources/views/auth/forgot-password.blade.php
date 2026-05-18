<x-guest-layout>

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Reset Password</h1>
        <p class="text-gray-500 text-sm mt-2">
            Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email
            </label>

            <input id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="mt-1 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm">

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
            Email Password Reset Link
        </button>

        <!-- Back to Login -->
        <div class="text-center">
            <a href="{{ route('login') }}"
               class="text-sm text-blue-600 hover:underline">
                ← Back to Login
            </a>
        </div>
    </form>

</x-guest-layout>
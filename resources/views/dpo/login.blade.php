<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login DPO | Sistem Permohonan Data LZNK</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">

        <!-- Main Card -->
        <div class="w-full max-w-5xl bg-white text-gray-800 p-12 rounded-2xl shadow-xl">

            <!-- Logo + Title -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/lznk-logo.png') }}" class="mx-auto h-20 mb-4">
                <h2 class="text-2xl font-semibold">Login DPO</h2>
                <p class="text-gray-500 text-sm">Sistem Permohonan Data LZNK</p>
            </div>

            <!-- ERROR -->
            @if (session('error'))
                <div class="text-red-500 text-center mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="{{ route('dpo.login.submit') }}" class="max-w-lg mx-auto">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold text-lg transition">
                    Log Masuk DPO
                </button>

                <!-- Back to Pemohon -->
                <div class="text-center mt-5 text-sm text-gray-600">
                    Login sebagai pemohon?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">
                        Login Pemohon
                    </a>
                </div>

            </form>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-400 mt-8">
                © {{ date('Y') }} LZNK System
            </div>

        </div>

    </div>

</body>
</html>
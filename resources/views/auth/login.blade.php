<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Permohonan Data LZNK</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="min-h-screen flex items-center justify-center bg-cover bg-center relative"
        style="background-image: url('{{ asset('images/zakat-bg.jpg') }}');">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <!-- Main Card -->
        <div class="relative z-10 w-full max-w-5xl bg-white text-gray-800 p-12 rounded-2xl shadow-xl">

            <!-- Logo + Title -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/lznk-logo.png') }}" class="mx-auto h-20 mb-4">
                <h2 class="text-2xl font-semibold">Sistem Permohonan Data</h2>
                <p class="text-gray-500 text-sm">Lembaga Zakat Negeri Kedah</p>
            </div>

            <!-- Status -->
            @if (session('status'))
                <div class="text-green-600 text-center mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Errors -->
            @if ($errors->any())
                <div class="text-red-500 text-center mb-4">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="max-w-lg mx-auto">
                @csrf

                <div class="mb-5">
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-5">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="flex items-center justify-between text-sm text-gray-600 mb-5">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-2">
                        Remember me
                    </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline"
                    href="{{ route('password.request') }}">
                        Lupa Kata Laluan
                    </a>
                @endif
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold text-lg transition">
                    Log Masuk
                </button>

                <div class="text-center mt-5 text-sm text-gray-600">
                    Belum ada akaun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
                        Daftar
                    </a>
                </div>

            </form>

            <div class="text-center text-xs text-gray-400 mt-8">
                © {{ date('Y') }} LZNK System
            </div>

        </div>

    </div>

</body>
</html>
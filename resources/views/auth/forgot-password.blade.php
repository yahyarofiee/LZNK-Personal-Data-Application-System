{{-- resources/views/auth/forgot-password.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Laluan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-100 overflow-hidden">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/zakat-bg.jpg') }}"
             class="w-full h-full object-cover"
             alt="Background">
    </div>

    {{-- Dark Overlay --}}
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    {{-- Main Container --}}
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">

    {{-- AUTH CARD --}}
    <div class="w-full max-w-2xl bg-white
                rounded-[35px] shadow-2xl
                px-10 py-8 overflow-hidden">

            <div class="w-full max-w-md mx-auto">

                {{-- CONTENT --}}
                <div class="text-gray-800">

                    {{-- Logo --}}
                    <div class="flex justify-center mb-5">
                        <img src="{{ asset('images/lznk-logo.png') }}"
                             alt="LZNK Logo"
                             class="h-20 object-contain">
                    </div>

                    {{-- Heading --}}
                    <div class="text-center mb-8">

                        <h1 class="text-4xl font-bold tracking-wide text-gray-800">
                            Lupa Kata Laluan
                        </h1>

                        <p class="text-sm text-black-500 mt-3 leading-relaxed">
                            Jangan risau. Masukkan alamat emel anda dan kami akan
                            menghantar pautan untuk menetapkan semula kata laluan.
                        </p>

                    </div>

                    {{-- Success Message --}}
                    @if (session('status'))
                        <div class="mb-5 p-4 rounded-2xl bg-green-100 border border-green-300 text-green-700 text-sm font-semibold text-center shadow-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        {{-- Email --}}
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Alamat Emel
                            </label>

                            <input
                                type="email"
                                name="email"
                                required
                                autofocus
                                placeholder="contoh@email.com"
                                class="w-full rounded-2xl border border-gray-300
                                    bg-white text-gray-800 placeholder-gray-400
                                       px-5 py-4 focus:outline-none
                                       focus:ring-2 focus:ring-green-400
                                       transition duration-300"
                            >

                            @error('email')
                                <p class="text-red-300 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- Submit Button --}}
                        <button
                            type="submit"
                            class="w-full bg-green-500 hover:bg-green-600
                                   text-white font-semibold py-4 rounded-2xl
                                   transition duration-300 shadow-lg
                                   hover:scale-[1.02]"
                        >
                            Hantar Pautan Reset
                        </button>

                        {{-- Back Login --}}
                        <a href="{{ route('login') }}"
                        class="mt-5 flex items-center justify-center
                            text-sm text-black-500 hover:text-green-600
                                  transition duration-300">

                            ← Kembali ke Log Masuk

                        </a>

                    </form>

                </div>

                {{-- Footer --}}
                <p class="text-center text-gray-400 text-sm mt-8">
                    © 2026 Sistem Permohonan Data LZNK
                </p>

            </div>

        </div>

    </div>

</body>
</html>
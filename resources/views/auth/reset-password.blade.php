{{-- resources/views/auth/reset-password.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Laluan</title>

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
                            Reset Kata Laluan
                        </h1>

                        <p class="text-sm text-gray-500 mt-3 leading-relaxed">
                            Masukkan kata laluan baharu anda untuk
                            meneruskan akses ke sistem.
                        </p>

                    </div>

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-5 p-4 rounded-2xl bg-red-100 border border-red-300 text-red-700 text-sm font-semibold shadow-sm">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('password.store') }}">

                        @csrf

                        {{-- Token --}}
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        {{-- Email --}}
                        <div class="mb-5">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Alamat Emel
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', request()->email) }}"
                                required
                                autofocus
                                readonly
                                class="w-full rounded-2xl border border-gray-300
                                       bg-gray-100 text-gray-700
                                       px-5 py-4 focus:outline-none"
                            >

                        </div>

                        {{-- Password --}}
                        <div class="mb-5">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Kata Laluan Baharu
                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                placeholder="Masukkan kata laluan baharu"
                                class="w-full rounded-2xl border border-gray-300
                                       bg-white text-gray-800 placeholder-gray-400
                                       px-5 py-4 focus:outline-none
                                       focus:ring-2 focus:ring-green-400
                                       transition duration-300"
                            >

                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-medium text-gray-700">
                                Sahkan Kata Laluan
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Sahkan kata laluan"
                                class="w-full rounded-2xl border border-gray-300
                                       bg-white text-gray-800 placeholder-gray-400
                                       px-5 py-4 focus:outline-none
                                       focus:ring-2 focus:ring-green-400
                                       transition duration-300"
                            >

                        </div>

                        {{-- Submit Button --}}
                        <button
                            type="submit"
                            class="w-full bg-green-500 hover:bg-green-600
                                   text-white font-semibold py-4 rounded-2xl
                                   transition duration-300 shadow-lg
                                   hover:scale-[1.02]"
                        >
                            Reset Kata Laluan
                        </button>

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
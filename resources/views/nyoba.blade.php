    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Masuk ke Tokopedia</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-50">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-md w-full space-y-8 p-6 bg-white rounded-xl shadow-lg relative">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <img src="{{ asset('images/tokopedia-logo.png') }}" alt="Tokopedia" class="h-8 mx-auto">
                </div>

                <!-- Login Form -->
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold text-center text-gray-900">Masuk ke Tokopedia</h2>

                    <!-- Register Link -->
                    <div class="text-right">
                        <a href="{{ route('register') }}"
                            class="text-green-500 hover:text-green-600 font-medium">Daftar</a>
                    </div>

                    <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Phone/Email Input -->
                        <div>
                            <label for="email" class="sr-only">Nomor HP atau Email</label>
                            <input id="email" name="email" type="text" required
                                class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                                placeholder="Nomor HP atau Email">
                            <div class="mt-1 text-sm text-gray-500">
                                Contoh : 08123456789
                            </div>
                        </div>

                        <!-- Need Help Link -->
                        <div class="text-right">
                            <a href="/" class="text-green-500 hover:text-green-600 text-sm">
                                Butuh bantuan?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Selanjutnya
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">atau masuk dengan</span>
                        </div>
                    </div>

                    <!-- Alternative Login Methods -->
                    <div class="space-y-3">
                        <button
                            class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <span class="mr-2">
                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                    <path
                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1.086-10.632L7.25 17.5l6.132-3.632L17.75 6.5l-6.836 4.868z" />
                                </svg>
                            </span>
                            Scan Kode QR
                        </button>

                        <button
                            class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <img src="{{ asset('images/google-logo.png') }}" alt="Google" class="h-5 w-5 mr-2">
                            Google
                        </button>
                    </div>
                </div>
            </div>

            <!-- Decorative Images -->
            <div class="absolute left-0 bottom-0">
                <img src="{{ asset('images/tokopedia-mascot.png') }}" alt="Mascot" class="h-24">
            </div>
        </div>

        @push('scripts')
            <script src="{{ asset('js/app.js') }}"></script>
        @endpush
    </body>

    </html>

<x-app-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-800 my-4">Dashboard Superadmin</h1>

        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Member</h2>
                <p class="text-gray-600">1,250</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Instruktur</h2>
                <p class="text-gray-600">45</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Admin</h2>
                <p class="text-gray-600">5</p>
            </div>
        </div>
    </div>
      <!-- Manage Role Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Manage Role</h3>
                    <p class="text-gray-600 mb-4">Kelola role dan hak akses pengguna sistem</p>
                    <a href="{{ route('superadmin.users') }}"
                        class="inline-block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Akses Menu
                    </a>
                </div>
            </div>

</x-app-layout>

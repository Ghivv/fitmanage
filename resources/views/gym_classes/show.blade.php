<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->

<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header Banner -->
                <div class="bg-blue-600 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white">Detail Kelas Gym</h2>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <!-- Class Name -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $gymClass->name }}</h1>
                    </div>

                    <!-- Class Details -->
                    <div class="space-y-6">
                        <!-- Description -->
                        <div class="flex flex-col">
                            <h3 class="text-sm font-medium text-gray-500">Deskripsi</h3>
                            <p class="mt-2 text-gray-900">
                                {{ $gymClass->description ?? 'Tidak ada deskripsi' }}
                            </p>
                        </div>

                        <!-- Instructor -->
                        <div class="flex flex-col">
                            <h3 class="text-sm font-medium text-gray-500">Instruktur</h3>
                            <div class="mt-2 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="inline-block h-10 w-10 rounded-full bg-blue-100 text-blue-600">
                                        <svg class="h-10 w-10 p-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </span>
                                </div>
                                <p class="ml-3 text-gray-900 font-medium">{{ $gymClass->instructor->name }}</p>
                            </div>
                        </div>

                        <!-- Capacity -->
                        <div class="flex flex-col">
                            <h3 class="text-sm font-medium text-gray-500">Kapasitas</h3>
                            <div class="mt-2 flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <p class="ml-2 text-gray-900">{{ $gymClass->capacity }} orang</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-8">
                        <a href="{{ route('gym_classes.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            <svg class="mr-2 -ml-1 h-5 w-5 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

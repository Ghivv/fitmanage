<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->

<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header with Icon -->
            <div class="text-center mb-10">
                <div class="inline-block p-3 bg-indigo-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 leading-tight">
                    Tambah Jadwal Kelas
                </h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                    Silakan isi detail jadwal kelas baru di bawah ini untuk menambahkan ke sistem
                </p>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-8 bg-red-50 border border-red-200 rounded-xl overflow-hidden">
                    <div class="px-4 py-3 bg-red-100 border-b border-red-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <h3 class="ml-2 text-sm font-medium text-red-800">
                                Terdapat beberapa kesalahan
                            </h3>
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <ul class="list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('schedules.store') }}" method="POST">
                        @csrf

                        <!-- Class Selection -->
                        <div class="space-y-8">
                            <div class="relative">
                                <label for="gym_class_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pilih Kelas
                                </label>
                                <div class="relative">
                                    <select name="gym_class_id" id="gym_class_id"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 hover:border-indigo-400"
                                        required>
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach($gymClasses as $class)
                                            <option value="{{ $class->id }}" class="py-2">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Schedule Time -->
                            <div class="relative">
                                <label for="schedule_time" class="block text-sm font-medium text-gray-700 mb-2">
                                    Waktu Jadwal
                                </label>
                                <input type="datetime-local" name="schedule_time" id="schedule_time"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 hover:border-indigo-400"
                                    required>
                            </div>

                            <!-- Status Selection -->
                            <div class="relative">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status
                                </label>
                                <select name="status" id="status"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 hover:border-indigo-400"
                                    required>
                                    <option value="active" class="text-green-600">✓ Aktif</option>
                                    <option value="cancelled" class="text-red-600">✗ Dibatalkan</option>
                                </select>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-10 flex items-center justify-end space-x-4">
                            <a href="{{ route('schedules.index') }}"
                                class="px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                Kembali
                            </a>
                            <button type="submit"
                                class="px-6 py-3 bg-indigo-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Jadwal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

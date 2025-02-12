<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Check Out Member') }}
            </h2>
            <a href="{{ route('attendances.index') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Informasi Member -->
                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kehadiran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-600">Member:</p>
                                <p class="text-base font-medium">{{ $attendance->member->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Kelas:</p>
                                {{-- <p class="text-base font-medium">{{ $attendance->gymClass->name }}</p> --}}
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Check In:</p>
                                <p class="text-base font-medium">{{ $attendance->check_in }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Check Out -->
                    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="check_out" class="block text-sm font-medium text-gray-700">
                                Waktu Check Out
                            </label>
                            <input type="datetime-local" id="check_out" name="check_out"
                                value="{{ old('check_out', $attendance->check_out ? date('Y-m-d\TH:i', strtotime($attendance->check_out)) : '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @error('check_out')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('attendances.show', $attendance->id) }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Simpan Check Out
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

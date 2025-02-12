<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Kehadiran') }}
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Informasi Member</h3>
                                <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                                    <p class="text-sm text-gray-600">Nama:</p>
                                    <p class="text-base font-medium">{{ $attendance->member->name }}</p>
                                </div>
                            </div>

                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Informasi Kelas</h3>
                                <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                                    <p class="text-sm text-gray-600">Nama Kelas:</p>
                                    {{-- <p class="text-base font-medium">{{ $attendance->gymClass->name }}</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Waktu Kehadiran</h3>
                                <div class="mt-2 p-4 bg-gray-50 rounded-lg space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-600">Check In:</p>
                                        <p class="text-base font-medium">{{ $attendance->check_in }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Check Out:</p>
                                        <p class="text-base font-medium">
                                            {{ $attendance->check_out ?? 'Belum check out' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-3">
                                @if (!$attendance->check_out)
                                    <a href="{{ route('attendances.edit', $attendance->id) }}"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Check Out
                                    </a>
                                @endif
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

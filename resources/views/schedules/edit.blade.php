<!-- When there is no desire, all things are at peace. - Laozi -->

<x-app-layout>
<div class="min-h-screen py-8">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Edit Jadwal Kelas</h2>
            <p class="mt-1 text-sm text-gray-600">Perbarui informasi jadwal kelas sesuai kebutuhan</p>
        </div>

        {{-- Error Alert --}}
        @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
            @csrf
            @method('PUT')

            <div class="px-4 py-6 sm:p-8">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8">
                    {{-- Gym Class Selection --}}
                    <div class="col-span-full">
                        <label for="gym_class_id" class="block text-sm font-medium leading-6 text-gray-900">
                            Pilih Kelas
                        </label>
                        <div class="mt-2">
                            <select name="gym_class_id" id="gym_class_id" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @foreach($gymClasses as $class)
                                    <option value="{{ $class->id }}" {{ $schedule->gym_class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Schedule Time --}}
                    <div class="col-span-full">
                        <label for="schedule_time" class="block text-sm font-medium leading-6 text-gray-900">
                            Waktu Jadwal
                        </label>
                        <div class="mt-2">
                            <input type="datetime-local" name="schedule_time" id="schedule_time" required
                                value="{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('Y-m-d\TH:i') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="col-span-full">
                        <label for="status" class="block text-sm font-medium leading-6 text-gray-900">
                            Status
                        </label>
                        <div class="mt-2">
                            <select name="status" id="status" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="active" {{ $schedule->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="cancelled" {{ $schedule->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="flex items-center justify-end gap-x-4 px-4 py-4 sm:px-8 border-t border-gray-900/10">
                <a href="{{ route('schedules.index') }}"
                    class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>

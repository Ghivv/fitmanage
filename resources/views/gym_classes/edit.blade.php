<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <!-- Header -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Edit Kelas Gym</h2>
                    <p class="mt-2 text-gray-600">Perbarui informasi kelas gym Anda di sini</p>
                </div>

                <form action="{{ route('gym_classes.update', $gymClass->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Kelas -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" name="name" id="name" value="{{ $gymClass->name }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out">{{ $gymClass->description }}</textarea>
                        </div>

                        <!-- Instruktur -->
                        <div>
                            <label for="instructor_id"
                                class="block text-sm font-medium text-gray-700">Instruktur</label>
                            <select name="instructor_id" id="instructor_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out"
                                required>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}"
                                        @if ($gymClass->instructor_id == $instructor->id) selected @endif>
                                        {{ $instructor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kapasitas -->
                        <div>
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="number" name="capacity" id="capacity" value="{{ $gymClass->capacity }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out"
                                    required>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4 pt-4">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                                Update Kelas
                            </button>
                            <a href="{{ route('gym_classes.index') }}"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

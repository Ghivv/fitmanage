<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

<x-app-layout>

    <div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Tambah Kelas Gym</h2>
    <form action="{{ route('gym_classes.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Kelas:</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Deskripsi:</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="instructor_id">Instruktur:</label>
            <select name="instructor_id" id="instructor_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="capacity">Kapasitas:</label>
            <input type="number" name="capacity" id="capacity" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
        </div>
    </form>
</div>

</x-app-layout>

<!-- The whole future lies in uncertainty: live immediately. - Seneca -->

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Detail Member</h2>
                        <div class="space-x-2">
                            <a href="{{ route('members.edit', $member) }}"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit Member
                            </a>
                            <a href="{{ route('members.index') }}"
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Informasi Pribadi</h3>
                                <div class="mt-4 space-y-3">
                                    <div>
                                        <span class="text-gray-600">Nama Lengkap:</span>
                                        <p class="font-medium">{{ $member->name }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Alamat:</span>
                                        <p class="font-medium">{{ $member->address }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Nomor Telepon:</span>
                                        <p class="font-medium">{{ $member->phone }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <p class="font-medium">{{ $member->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Informasi Membership</h3>
                                <div class="mt-4 space-y-3">
                                    <div>
                                        <span class="text-gray-600">Paket:</span>
                                        <p class="font-medium">{{ ucfirst($member->membership_package) }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Status:</span>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $member->isActive()
                                                ? 'bg-green-100 text-green-800'
                                                : 'bg-red-100 text-red-800' }}">
                                            {{ $member->isActive() ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Tanggal Mulai:</span>
                                        <p class="font-medium">{{ $member->start_date->format('d/m/Y') }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Tanggal Berakhir:</span>
                                        <p class="font-medium">{{ $member->end_date->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h3 class="text-lg font-medium text-gray-900">Informasi Tambahan</h3>
                                <div class="mt-4 space-y-3">
                                    <div>
                                        <span class="text-gray-600">Terdaftar Pada:</span>
                                        <p class="font-medium">{{ $member->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Terakhir Diperbarui:</span>
                                        <p class="font-medium">{{ $member->updated_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Nonaktifkan Member -->
                    <div class="mt-8 border-t pt-6">
                        <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="return confirm('Apakah Anda yakin ingin menonaktifkan member ini?')">
                                Nonaktifkan Member
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

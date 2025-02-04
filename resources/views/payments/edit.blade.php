<x-app-layout>

<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ isset($payment) ? 'Edit' : 'Tambah' }} Pembayaran</h2>

        <form action="{{ isset($payment) ? route('payments.update', $payment->id) : route('payments.store') }}" method="POST" class="space-y-4">
            @csrf
            @if(isset($payment))
                @method('PUT')
            @endif

            <div>
                <label for="member_id" class="block text-sm font-medium text-gray-700">Member</label>
                <select name="member_id" class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                    <option value="">Pilih Member</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}"
                            {{ isset($payment) && $payment->member_id == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                <input type="number" name="amount" class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200" required value="{{ $payment->amount ?? old('amount') }}">
            </div>

            <div>
                <label for="payment_date" class="block text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
                <input type="datetime-local" name="payment_date" class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200" required value="{{ isset($payment) ? date('Y-m-d\TH:i', strtotime($payment->payment_date)) : old('payment_date') }}">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                    <option value="pending" {{ isset($payment) && $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ isset($payment) && $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700">Simpan</button>
                <a href="{{ route('payments.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</div>

</x-app-layout>

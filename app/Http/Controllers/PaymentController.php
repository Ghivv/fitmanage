<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('member')
        ->where('gym_id', Auth::user()->gym_id)
        ->latest()
        ->get();

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $members = Member::where('gym_id', Auth::user()->gym_id)->get();
        return view('payments.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid',
        ]);

        // Pastikan member_id berasal dari gym yang sesuai
        if (!Member::where('id', $validated['member_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['member_id' => 'Member tidak valid.']);
        }

        // Tambahkan gym_id sesuai dengan pengguna yang login
        $validated['gym_id'] = Auth::user()->gym_id;

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dicatat!');
    }

    public function show($id)
    {
        $payment = Payment::with('member')->findOrFail($id);

        $this->authorizePaymentAccess($payment);

        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::with('member')->findOrFail($id);

        $this->authorizePaymentAccess($payment);

        return view('payments.edit', compact('payment', 'members'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid',
        ]);

        $payment = Payment::findOrFail($id);

        $this->authorizePaymentAccess($payment);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        $this->authorizePaymentAccess($payment);

        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    private function authorizePaymentAccess(Payment $payment)
    {
        if ($payment->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak diizinkan mengakses sumber daya ini.');
        }
    }
}

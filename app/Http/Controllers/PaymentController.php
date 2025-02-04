<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Member;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('member')->latest()->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $members = Member::all();
        return view('payments.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'status' => 'required|in:pending,paid',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dicatat!');
    }

    public function show($id)
    {
        $payment = Payment::with('member')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $members = Member::all();
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
        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}

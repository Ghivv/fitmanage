<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

@extends('layouts.dashboard')

@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2>Membership Info</h2>
        {{-- <p>Package: {{ $member->membership_package }}</p>
        <p>Active Until: {{ $member->end_date }}</p> --}}
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Upcoming Classes</h2>
        {{-- @foreach($upcomingClasses as $class)
            <div class="py-2 border-b">
                <p>{{ $class->name }}</p>
                <p class="text-sm">{{ $class->schedule }}</p>
            </div>
        @endforeach --}}
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Pending Payments</h2>
        {{-- @foreach($activePayments as $payment)
            <div class="py-2 border-b">
                <p>Amount: Rp {{ number_format($payment->amount, 2) }}</p>
                <p class="text-sm">Status: {{ $payment->status }}</p>
            </div>
        @endforeach --}}
    </div>
</div>

<div class="mt-6 grid grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2>Recent Attendances</h2>
        {{-- @foreach($memberAttendances as $attendance)
            <div class="py-2 border-b">
                <p>{{ $attendance->gymClass->name }}</p>
                <p class="text-sm">Check-in: {{ $attendance->check_in }}</p>
            </div>
        @endforeach --}}
    </div>
</div>
@endsection

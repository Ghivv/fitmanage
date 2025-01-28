<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Attendance;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $member = auth::user()->user;

    //     $upcomingClasses = GymClass::where('schedule', '>', now())
    //         ->limit(5)
    //         ->get();

    //     $memberAttendances = Attendance::where('member_id', $member->id)
    //         ->with('gymClass')
    //         ->latest()
    //         ->limit(1)
    //         ->get();

    //     $activePayments = Payment::where('member_id', $member->id)
    //         ->where('status', 'pending')
    //         ->get();

    //     return view('dashboard', compact(
    //         'member',
    //         'upcomingClasses',
    //         'memberAttendances',
    //         'activePayments'
    //     ));
    // }

    public function index()
    {
        return view('user.dashboard');
    }
}

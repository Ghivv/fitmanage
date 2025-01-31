<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\GymClass;
use App\Models\Instructor;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $totalMembers = Member::count();
    //     $totalClasses = GymClass::count();
    //     $totalInstructors = Instructor::count();

    //     $recentMembers = Member::latest()->limit(5)->get();
    //     $upcomingClasses = GymClass::upcoming()->limit(5)->get();
    //     $pendingClasses = GymClass::where('schedule', '>', now())->limit(5)->get();

    //     return view('admin.dashboard', compact(
    //         'totalMembers',
    //         'totalClasses',
    //         'totalInstructors',
    //         'recentMembers',
    //         'upcomingClasses',
    //         'pendingClasses'
    //     ));
    // }

    public function index()
    {
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $instructor = auth::user()->instructor;

        $totalClasses = GymClass::where('instructor_id', $instructor->id)->count();
        $upcomingClasses = GymClass::where('instructor_id', $instructor->id)
            ->upcoming()
            ->limit(5)
            ->get();

        $classMembersCount = Attendance::whereHas('gymClass', function ($query) use ($instructor) {
            $query->where('instructor_id', $instructor->id);
        })->count();

        return view('instructor.dashboard', compact(
            'instructor',
            'totalClasses',
            'upcomingClasses',
            'classMembersCount'
        ));
    }
}

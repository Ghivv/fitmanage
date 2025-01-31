<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\GymClass;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('gymClass')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $gymClasses = GymClass::all();
        return view('schedules.create', compact('gymClasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
            'schedule_time' => 'required|date',
            'status' => 'required|in:active,cancelled',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        $gymClasses = GymClass::all();
        return view('schedules.edit', compact('schedule', 'gymClasses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
            'schedule_time' => 'required|date',
            'status' => 'required|in:active,cancelled',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}

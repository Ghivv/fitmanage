<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\GymClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('gymClass')
            ->where('gym_id', Auth::user()->gym_id)
            ->get();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $gymClasses = GymClass::where('gym_id', Auth::user()->gym_id)->get();
        return view('schedules.create', compact('gymClasses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
            'schedule_time' => 'required|date',
            'status' => 'required|in:active,cancelled',
        ]);

        // Pastikan gym_class_id berasal dari gym yang sesuai
        if (!GymClass::where('id', $validated['gym_class_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['gym_class_id' => 'Kelas gym tidak valid.']);
        }

        // Tambahkan gym_id sesuai dengan pengguna yang login
        $validated['gym_id'] = Auth::user()->gym_id;

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show(Schedule $schedule)
    {
        $this->authorizeScheduleAccess($schedule);

        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $this->authorizeScheduleAccess($schedule);

        $gymClasses = GymClass::where('gym_id', Auth::user()->gym_id)->get();
        return view('schedules.edit', compact('schedule', 'gymClasses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $this->authorizeScheduleAccess($schedule);

        $validated = $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
            'schedule_time' => 'required|date',
            'status' => 'required|in:active,cancelled',
        ]);

        if (!GymClass::where('id', $validated['gym_class_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['gym_class_id' => 'Kelas gym tidak valid.']);
        }

        $schedule->update($validated);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorizeScheduleAccess($schedule);

        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
    private function authorizeScheduleAccess(Schedule $schedule)
    {
        if ($schedule->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak diizinkan mengakses sumber daya ini.');
        }
    }
}

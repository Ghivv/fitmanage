<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\GymClass;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with(['member', 'gymClass'])
            ->whereHas('member', function ($query) {
                $query->where('gym_id', Auth::user()->gym_id);
            })
            ->get();

        return view('attendances.index', compact('attendance'));
    }

    public function create()
    {
        $members = Member::where('gym_id', Auth::user()->gym_id)->get();
        $gymClasses = GymClass::where('gym_id', Auth::user()->gym_id)->get();
        return view('attendances.create', compact('members', 'gymClasses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'gym_class_id' => 'required|exists:gym_classes,id',
            'check_in' => 'required|date',
        ]);

        // Pastikan member_id berasal dari gym yang sesuai
        if (!Member::where('id', $validated['member_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['member_id' => 'Member tidak valid.']);
        }

        // Pastikan gymclass_id berasal dari gym admin jika ada
        if (!GymClass::where('id', $validated['gym_class_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['gym_class_id' => 'Kelas gym tidak valid.']);
        }

        // Tambahkan gym_id sesuai dengan pengguna yang login
        $validated['gym_id'] = Auth::user()->gym_id;

        Attendance::create($validated);

        return redirect()->route('attendances.index')->with('success', 'Presensi berhasil dicatat!');
    }
    public function show($id)
    {
        $attendance = Attendance::with(['member', 'gymClass'])->findOrFail($id);

        $this->authorizeAttendanceAccess($attendance);

        return view('attendances.show', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::with(['member', 'gymClass'])->findOrFail($id);

        $this->authorizeAttendanceAccess($attendance);

        return view('attendances.edit', compact('attendance',));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'check_out' => 'required|date|after:check_in',
        ]);

        $attendance = Attendance::findOrFail($id);

        $this->authorizeAttendanceAccess($attendance);

        $attendance->update([
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Check-out berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);

        $this->authorizeAttendanceAccess($attendance);

        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Data kehadiran dihapus.');
    }

    private function authorizeAttendanceAccess(Attendance $attendance)
    {
        if ($attendance->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak diizinkan mengakses sumber daya ini.');
        }
    }
}

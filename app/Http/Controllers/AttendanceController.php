<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Member;
use App\Models\GymClass;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with(['member', 'gymClass'])->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $gymClasses = GymClass::all();
        return view('attendances.create', compact('members', 'gymClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'gymclass_id' => 'nullable|exists:gym_classes,id',
            'check_in' => 'required|date',
        ]);

        Attendance::create([
            'member_id' => $request->member_id,
            'gymclass_id' => $request->gym_class_id ?? null,
            'check_in' => $request->check_in,
            'check_out' => null,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::with(['member', 'gymClass'])->find($id);
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendances.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'check_out' => 'required|date|after:check_in',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update([
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Check-out berhasil!');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Data kehadiran dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Instructor;

class GymClassController extends Controller
{
    public function index()
    {
        $gymClasses = GymClass::with('instructor')->get();
        return view('gym_classes.index', compact('gymClasses'));
    }

    public function create()
    {
        $instructors = Instructor::all();
        return view('gym_classes.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor_id' => 'required|exists:instructors,id',
            'capacity' => 'required|integer|min:1',
        ]);

        GymClass::create($request->all());

        return redirect()->route('gym_classes.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function show(GymClass $gymClass)
    {
        return view('gym_classes.show', compact('gymClass'));
    }

    public function edit(GymClass $gymClass)
    {
        $instructors = Instructor::all();
        return view('gym_classes.edit', compact('gymClass', 'instructors'));
    }

    public function update(Request $request, GymClass $gymClass)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor_id' => 'required|exists:instructors,id',
            'capacity' => 'required|integer|min:1',
        ]);

        $gymClass->update($request->all());

        return redirect()->route('gym_classes.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(GymClass $gymClass)
    {
        $gymClass->delete();
        return redirect()->route('gym_classes.index')->with('success', 'Kelas berhasil dihapus.');
    }
}

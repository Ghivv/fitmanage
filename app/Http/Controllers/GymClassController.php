<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GymClassController extends Controller
{
    public function index()
    {
        $gymClasses = GymClass::with('instructor')
            ->where('gym_id', Auth::user()->gym_id)
            ->get();

        return view('gym_classes.index', compact('gymClasses'));
    }

    public function create()
    {
        $instructors = Instructor::where('gym_id', Auth::user()->gym_id)->get();
        return view('gym_classes.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:instructors,id',
        ]);

        // Pastikan instructor_id berasal dari gym yang sesuai
        if (!Instructor::where('id', $validated['instructor_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['instructor_id' => 'Instruktur tidak valid.']);
        }

        // Tambahkan gym_id sesuai dengan pengguna yang login
        $validated['gym_id'] = Auth::user()->gym_id;

        GymClass::create($validated);

        return redirect()->route('gym_classes.index')->with('success', 'Kelas gym berhasil ditambahkan.');
    }

    public function show(GymClass $gymClass)
    {
        $this->authorizeGymClassAccess($gymClass);
        return view('gym_classes.show', compact('gymClass'));
    }

    public function edit(GymClass $gymClass)
    {
        $this->authorizeGymClassAccess($gymClass);

        $instructors = Instructor::where('gym_id', Auth::user()->gym_id)->get();
        return view('gym_classes.edit', compact('gymClass', 'instructors'));
    }

    public function update(Request $request, GymClass $gymClass)
    {
        $this->authorizeGymClassAccess($gymClass);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:instructors,id',
        ]);

        // Pastikan instructor_id berasal dari gym yang sesuai
        if (!Instructor::where('id', $validated['instructor_id'])->where('gym_id', Auth::user()->gym_id)->exists()) {
            return redirect()->back()->withErrors(['instructor_id' => 'Instruktur tidak valid.']);
        }

        $gymClass->update($validated);

        return redirect()->route('gym_classes.index')->with('success', 'Kelas gym berhasil diperbarui.');
    }

    public function destroy(GymClass $gymClass)
    {
        $this->authorizeGymClassAccess($gymClass);

        $gymClass->delete();
        return redirect()->route('gym_classes.index')->with('success', 'Kelas gym berhasil dihapus.');
    }

    private function authorizeGymClassAccess(GymClass $gymClass)
    {
        if ($gymClass->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak diizinkan mengakses sumber daya ini.');
        }
    }
}

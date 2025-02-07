<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function index()
    {
        $gym_id = Auth::user()->gym_id; // Ambil gym_id dari pengguna yang sedang login

        $query = Instructor::where('gym_id', $gym_id); // Filter instruktur berdasarkan gym_id

        $instructors = $query->paginate(10); // Paginate hasil query

        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
        ]);

        $validated = $request->all(); // Ambil semua data yang sudah tervalidasi
        $validated['gym_id'] = Auth::user()->gym_id; // Pastikan gym_id sesuai dengan pengguna yang login

        Instructor::create($validated); // Simpan data instruktur baru

        return redirect()->route('instructors.index')
            ->with('success', 'Instruktur berhasil ditambahkan.');
    }

    public function show(Instructor $instructor)
    {
        $this->authorizeInstructorAccess($instructor); // Pastikan instruktur berasal dari gym yang sama
        return view('instructors.show', compact('instructor'));
    }

    public function edit(Instructor $instructor)
    {
        $this->authorizeInstructorAccess($instructor); // Cek akses sebelum mengedit
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $this->authorizeInstructorAccess($instructor); // Pastikan pengguna memiliki akses

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
        ]);

        $instructor->update($validated); // Perbarui data instruktur

        return redirect()->route('instructors.index')->with('success', 'Instruktur berhasil diperbarui.');
    }

    public function destroy(Instructor $instructor)
    {
        $this->authorizeInstructorAccess($instructor); // Pastikan instruktur berasal dari gym yang sama sebelum dihapus

        $instructor->delete(); // Hapus instruktur
        return redirect()->route('instructors.index')->with('success', 'Instruktur berhasil dihapus.');
    }

    private function authorizeInstructorAccess(Instructor $instructor)
    {
        if ($instructor->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak memiliki akses ke instruktur ini.'); // Cegah akses ke instruktur dari gym lain
        }
    }
}

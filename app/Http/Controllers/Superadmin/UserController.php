<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::paginate(10); // Pagination untuk daftar user
        return view('superadmin.users.index', compact('users'));
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,instructor,user,superadmin', // Validasi role
        ]);

        $user = User::create($request->all());

        return redirect()->route('superadmin.users.index')->with('success', 'User created successfully!');
    }

    // Mengupdate role pengguna
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,instructor,user,superadmin', // Validasi role
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Role updated successfully!');
    }
}

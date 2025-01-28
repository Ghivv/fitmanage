<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::paginate(10); // Pagination untuk daftar user
        return view('admin.users.index', compact('users'));
    }

    // Mengupdate role pengguna
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,instructor,user', // Validasi role
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Role updated successfully!');
    }
}

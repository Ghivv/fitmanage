<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $gymId = Auth::user()->gym_id; // Ambil gym_id admin yang sedang login

        $query = Member::where('gym_id', $gymId); // Filter hanya untuk gym admin

        if ($request->search) {
            $query->where('name', 'LIKE', "%{$request->search}%");
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->package) {
            $query->where('membership_package', $request->package);
        }

        $members = $query->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable|email',
            'membership_package' => 'required|in:basic,premium,vip',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $validated['status'] = 'active';
        $validated['gym_id'] = Auth::user()->gym_id; // Pastikan member terkait dengan gym admin

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        $this->authorizeMemberAccess($member); // Pastikan hanya admin gym terkait yang bisa mengedit
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $this->authorizeMemberAccess($member); // Cek apakah admin berhak mengubah data

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable|email',
            'membership_package' => 'required|in:basic,premium,vip',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Data member berhasil diperbarui.');
    }

    public function show(Member $member)
    {
        $this->authorizeMemberAccess($member); // Cegah akses jika member bukan milik gym admin
        return view('members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        $this->authorizeMemberAccess($member); // Pastikan hanya admin gym terkait yang bisa menghapus
        $member->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member berhasil dinonaktifkan.');
    }

    private function authorizeMemberAccess(Member $member)
    {
        if ($member->gym_id !== Auth::user()->gym_id) {
            abort(403, 'Anda tidak memiliki akses ke member ini.'); // Cegah akses ke member gym lain
        }
    }
}

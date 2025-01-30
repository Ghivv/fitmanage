<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

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
            'address' => 'required|string',
            'email' => 'nullable|email',
            'membership_package' => 'required|in:basic,premium,vip',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $validated['status'] = 'active';

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|string',
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
        return view('members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')
            ->with('success', 'Member berhasil dinonaktifkan.');
    }
}


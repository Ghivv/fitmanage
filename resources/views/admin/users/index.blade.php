@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Manage Users</h1>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ ucfirst($user->role) }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                                @csrf
                                <select name="role" onchange="this.form.submit()" class="form-select block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="instructor" {{ $user->role === 'instructor' ? 'selected' : '' }}>Instructor</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }} <!-- Pagination -->
    </div>

    <div>
        <x-secondary-button><a href="{{ route('admin.dashboard') }}" class="px-4 py-2">Dashboard</a></x-secondary-button>
    </div>
</div>
@endsection

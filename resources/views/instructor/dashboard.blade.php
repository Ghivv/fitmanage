<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->

@extends('layouts.instructor')

@section('content')
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-100 p-4 rounded-lg shadow">
        <h3>Total Classes</h3>
        <p class="text-2xl font-bold">{{ $totalClasses }}</p>
    </div>
    <div class="bg-green-100 p-4 rounded-lg shadow">
        <h3>Total Class Members</h3>
        <p class="text-2xl font-bold">{{ $classMembersCount }}</p>
    </div>
    <div class="bg-purple-100 p-4 rounded-lg shadow">
        <h3>My Profile</h3>
        <p>{{ $instructor->name }}</p>
    </div>
</div>

<div class="grid grid-cols-2 gap-6">
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl mb-4">Upcoming Classes</h2>
        @foreach($upcomingClasses as $class)
            <div class="flex justify-between py-2 border-b">
                <span>{{ $class->name }}</span>
                <span class="text-sm text-gray-500">{{ $class->date }} {{ $class->time }}</span>
            </div>
        @endforeach
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('instructor.classes') }}" class="bg-blue-500 text-white p-2 rounded text-center">
                My Classes
            </a>
            <a href="{{ route('instructor.profile') }}" class="bg-green-500 text-white p-2 rounded text-center">
                Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection

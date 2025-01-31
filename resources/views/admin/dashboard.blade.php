<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

@extends('layouts.dashboard')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                <h1 class="text-2xl md:text-3xl font-bold text-white">
                    Selamat Datang, {{ auth()->user()->name }}
                </h1>
                <p class="text-blue-100 mt-2">Dashboard Admin Panel</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Menu Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Manage Role Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Manage Role</h3>
                    <p class="text-gray-600 mb-4">Kelola role dan hak akses pengguna sistem</p>
                    <a href="{{ route('admin.users') }}"
                        class="inline-block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Akses Menu
                    </a>
                </div>
            </div>

            <!-- Member Management Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Member Management</h3>
                    <p class="text-gray-600 mb-4">Tambah dan kelola data member</p>
                    <a href="{{ route('members.index') }}"
                        class="inline-block w-full text-center bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Akses Menu
                    </a>
                </div>
            </div>

            <!-- Schedule Management Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Schedule Management</h3>
                    <p class="text-gray-600 mb-4">Atur dan kelola jadwal kegiatan</p>
                    <a href="{{ route('schedules.index') }}"
                        class="inline-block w-full text-center bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Akses Menu
                    </a>
                </div>
            </div>

            <!-- Instructors Management Card -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Instructors Management</h3>
                    <p class="text-gray-600 mb-4">Atur dan kelola data instruktur</p>
                    <a href="{{ route('instructors.index') }}"
                        class="inline-block w-full text-center bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300">
                        Akses Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

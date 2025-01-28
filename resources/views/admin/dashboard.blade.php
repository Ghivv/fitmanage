<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

@extends('layouts.dashboard')

@section('content')
    <div class="space-y-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}</h1>

            <x-primary-button><a href="{{route('admin.users')}}" class="px-4 py-2">Manage Role</a></x-primary-button>

            <div class="grid grid-cols-3 gap-4">
                <!-- Upcoming Classes -->
                {{-- <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold mb-2">Kelas Mendatang</h2>

                    @if ($upcomingClasses->isNotEmpty())
                        @foreach ($upcomingClasses as $gymclass)
                            <div class="bg-white rounded p-2 mb-2">
                                <p class="font-medium">{{ $gymclass->name }}</p>
                                <p class="text-sm text-gray-600">{{ $gymclass->date }} | {{ $gymclass->time }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600">Tidak ada kelas mendatang.</p>
                    @endif

                    <a href="{{ route('classes') }}" class="text-blue-600 hover:underline">Lihat Semua Kelas</a>
                </div> --}}


                <!-- Recent Articles -->
                <div class="bg-green-100 p-4 rounded-lg">
                    <h2 class="font-semibold mb-2">Artikel Terbaru</h2>
                    {{-- @foreach ($recentArticles as $article)
                    <div class="bg-white rounded p-2 mb-2">
                        <p class="font-medium">{{ $article->title }}</p>
                        <p class="text-sm text-gray-600">{{ $article->excerpt }}</p>
                    </div>
                @endforeach --}}
                    {{-- <a href="{{ route('articles') }}" class="text-green-600 hover:underline">Baca Artikel</a> --}}
                </div>

                <!-- User Stats -->
                {{-- <div class="bg-purple-100 p-4 rounded-lg">
                    <h2 class="font-semibold mb-2">Statistik Anda</h2>
                    <div class="space-y-2">
                        <div class="bg-white rounded p-2">
                            <p class="text-sm">Total Kelas Diikuti</p>
                            <p class="font-bold">{{ $user->classes_count }}</p>
                        </div>
                        <div class="bg-white rounded p-2">
                            <p class="text-sm">Artikel Dibaca</p>
                            <p class="font-bold">{{ $user->articles_read_count }}</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

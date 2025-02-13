<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Instructor\DashboardController as InstructorDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Superadmin\DashboardController as SuperadminController;
use App\Http\Controllers\Superadmin\UserController as AdminUserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\GymClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PaymentController;
use App\Models\Gym;
use App\Models\User;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('superadmin.users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('superadmin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('superadmin.users.store');
    Route::post('/users/{user}/update-role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
});


// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('members', MemberController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('gym_classes', GymClassController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('payments', PaymentController::class);
});

// Instructor Routes
Route::prefix('instructor')->middleware(['auth', 'instructor'])->group(function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
});

// Member Routes
Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});






require __DIR__ . '/auth.php';

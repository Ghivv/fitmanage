<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Attendance;
use App\Models\Equipment;
use App\Models\GymClass;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Membuat data dummy untuk Instructor
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'instructor',
            'email' => 'instructor@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'instructor',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'user',
        ]);

        $instructor = Instructor::create([
            'name' => 'pelatih fitness',
            'email' => 'fitness@example.com',
            'phone' => '081234567890',
            'specialization' => 'Yoga'
        ]);

        // Membuat data dummy untuk Class
        $class = GymClass::create([
            'name' => 'Yoga Beginner',
            'description' => 'Kelas yoga untuk pemula.',
            'instructor_id' => $instructor->id,
            'schedule' => '2025-01-30 10:00:00',
            'capacity' => 20
        ]);

        // Membuat data dummy untuk Member
        $member = Member::create([
            'name' => 'masghiv',
            'email' => 'masghiv@example.com',
            'phone' => '089876543210',
            'membership_package' => 'Monthly',
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'status' => 'active'
        ]);

        // Membuat data dummy untuk Payment
        Payment::create([
            'member_id' => $member->id,
            'amount' => 500000,
            'payment_date' => now(),
            'status' => 'paid'
        ]);

        // Membuat data dummy untuk Attendance
        Attendance::create([
            'member_id' => $member->id,
            'gymclass_id' => $class->id,
            'check_in' => '2025-01-30 09:55:00',
            'check_out' => '2025-01-30 11:00:00'
        ]);

        // Membuat data dummy untuk Equipment
        Equipment::create([
            'name' => 'Treadmill',
            'quantity' => 5,
            'last_maintenance_date' => '2025-01-15',
            'next_maintenance_date' => '2025-02-15'
        ]);
    }
}

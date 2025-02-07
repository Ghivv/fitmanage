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
use App\Models\Schedule;

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

        User::create([
            'gym_id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'admin',
        ]);

        User::create([
            'gym_id' => 1,
            'name' => 'instructor',
            'email' => 'instructor@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk hashing
            'role' => 'user',
        ]);

        $instructor = Instructor::create([
            'gym_id' => 1,
            'name' => 'pelatih zumba',
            'email' => 'fitness@example.com',
            'phone' => '081234567890',
            'specialization' => 'Yoga'
        ]);

        // Membuat data dummy untuk Class
        $class = GymClass::create([
            'gym_id' => 1,
            'name' => 'Yoga',
            'description' => 'Kelas yoga untuk relaksasi dan pernapasan.',
            'instructor_id' => $instructor->id, // Pastikan instruktur dengan ID 1 ada
        ]);

        $class = GymClass::create([
            'gym_id' => 1,
            'name' => 'Zumba',
            'description' => 'Kelas zumba untuk meningkatkan kebugaran dengan gerakan tari.',
            'instructor_id' => $instructor->id,
        ]);

        // Membuat data dummy untuk Member
        $member = Member::create([
            'gym_id' => 1,
            'name' => 'masghiv',
            'user_id' => 1,
            'email' => 'masghiv@example.com',
            'phone' => '089876543210',
            'membership_package' => 'Monthly',
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'status' => 'active'
        ]);

        // Membuat data dummy untuk Payment
        Payment::create([
            'gym_id' => 1,
            'member_id' => $member->id,
            'amount' => 500000,
            'payment_date' => now(),
            'status' => 'paid'
        ]);

        // Membuat data dummy untuk Attendance
        Attendance::create([
            'gym_id' => 1,
            'member_id' => $member->id,
            'gymclass_id' => $class->id,
            'check_in' => '2025-01-30 09:55:00',
            'check_out' => '2025-01-30 11:00:00'
        ]);

        // Membuat data dummy untuk Equipment
        Equipment::create([
            'gym_id' => 1,
            'name' => 'Treadmill',
            'quantity' => 5,
            'last_maintenance_date' => '2025-01-15',
            'next_maintenance_date' => '2025-02-15'
        ]);

        schedule::create([
            'gym_id' => 1,
            'gym_class_id' => 1,  // ID kelas Yoga
            'schedule_time' => now()->addDays(2)->setTime(8, 0), // Jadwal 2 hari lagi jam 08:00
            'status' => 'active',
        ]);

        Schedule::create([
            'gym_id' => 1,
            'gym_class_id' => 2,  // ID kelas Zumba
            'schedule_time' => now()->addDays(3)->setTime(10, 0), // Jadwal 3 hari lagi jam 10:00
            'status' => 'active',
        ]);
    }
}

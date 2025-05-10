<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Bersihkan cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar permission per area
        $permissions = [
            'view_gym_profile',
            'update_gym_profile',
            'manage_gym_settings',
            'view_members',
            'create_members',
            'update_members',
            'delete_members',
            'view_packages',
            'create_packages',
            'update_packages',
            'delete_packages',
            'view_payments',
            'manage_payments',
            'view_finance_reports',
            'view_schedule',
            'manage_schedule',
            'assign_trainer',
            'book_class',
            'view_staff',
            'create_staff',
            'update_staff',
            'delete_staff',
            'approve_gyms',
            'reject_gyms',
            'manage_all_users',
            'manage_subscriptions',
            'view_dashboard',
            'view_reports',
            'view_homepage',
            'register_gym',
            'register_member',
        ];

        // Buat permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role dan assign permission
        Role::firstOrCreate(['name' => 'Super Admin'])->givePermissionTo(Permission::all());

        Role::firstOrCreate(['name' => 'Gym Owner'])->givePermissionTo([
            'view_gym_profile',
            'update_gym_profile',
            'manage_gym_settings',
            'view_members',
            'create_members',
            'update_members',
            'delete_members',
            'view_packages',
            'create_packages',
            'update_packages',
            'delete_packages',
            'view_payments',
            'manage_payments',
            'view_finance_reports',
            'view_schedule',
            'manage_schedule',
            'assign_trainer',
            'view_staff',
            'create_staff',
            'update_staff',
            'delete_staff',
            'view_dashboard',
            'view_reports',
        ]);

        Role::firstOrCreate(['name' => 'Staff'])->givePermissionTo([
            'view_members',
            'update_members',
            'view_packages',
            'view_schedule',
            'manage_schedule',
            'view_dashboard',
        ]);

        Role::firstOrCreate(['name' => 'Trainer'])->givePermissionTo([
            'view_schedule',
            'assign_trainer',
            'book_class',
        ]);

        Role::firstOrCreate(['name' => 'Member'])->givePermissionTo([
            'view_schedule',
            'book_class',
            'view_dashboard',
        ]);
    }
}

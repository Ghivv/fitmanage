<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->time('working_hours_start')->nullable();
            $table->time('working_hours_end')->nullable();
            $table->enum('status', ['pending', 'trial', 'active', 'suspended', 'inactive'])->default('pending');
            $table->boolean('setup_complete')->default(false);
            $table->string('logo')->nullable();
            $table->date('trial_started_at')->nullable();
            $table->date('trial_ends_at')->nullable();
            $table->date('activated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};

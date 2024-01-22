<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_lists', function (Blueprint $table) {
            $table->id();
            $table->string('identification_code')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('membership_plan')->nullable();
            $table->string('member_type')->nullable();
            $table->boolean('is_expired')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_lists');
    }
};

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
        Schema::create('employee_list', function (Blueprint $table) {
            $table->uuid('id');
            $table->id('employment_number');
            $table->char('first_name');
            $table->char('middle_name');
            $table->char('last_name');
            $table->string('email');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_list');
    }
};

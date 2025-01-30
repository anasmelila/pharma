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
        // Create departments table first
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('dep_id');
            $table->string('name');
            $table->timestamps();
        });

        // Create employees table
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('dep_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('dep_id')
                ->references('dep_id')
                ->on('departments')
                ->onDelete('cascade');
        });

        // Create employee_reports table
        Schema::create('employee_reports', function (Blueprint $table) {
            $table->bigIncrements('rep_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('emp_id');
            $table->tinyInteger('status')->default(0)->comment('0: Pending, 1: Approved, 2: Rejected');
            $table->timestamps();

            $table->foreign('emp_id')
                ->references('emp_id')
                ->on('employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_reports');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('departments');
    }
};

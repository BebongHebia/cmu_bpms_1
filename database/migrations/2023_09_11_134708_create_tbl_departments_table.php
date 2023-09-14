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
        Schema::create('tbl_departments', function (Blueprint $table) {
            $table->id();
            $table->Integer('office_id');
            $table->String('dept_name');
            $table->String('dept_description');
            $table->Integer('dept_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_departments');
    }
};

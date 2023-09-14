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
        Schema::create('tbl_budget_plans', function (Blueprint $table) {
            $table->id();
            $table->double('budget_amount');
            $table->double('budget_allocated');
            $table->String('year_plan');
            $table->Integer('plan_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_budget_plans');
    }
};

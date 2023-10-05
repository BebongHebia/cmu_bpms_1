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
        Schema::create('tbl_ppmps', function (Blueprint $table) {
            $table->id();
            $table->String('ppmp_code');
            $table->Integer('userid');
            $table->Integer('office_id');
            $table->Integer('budget_id');
            $table->Integer('ppmp_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ppms');
    }
};

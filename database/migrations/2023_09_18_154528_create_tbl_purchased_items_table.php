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
        Schema::create('tbl_purchased_items', function (Blueprint $table) {
            $table->id();
            $table->Integer('item_id');
            $table->String('item_code');
            $table->Integer('ppmp_id');
            $table->Integer('user_id');
            $table->Integer('budget_id');
            $table->Integer('office_id');
            $table->double('quantity_size');
            $table->Integer('item_category_id');
            $table->Integer('purhcased_item_status');
            $table->String('date_procured');
            $table->Integer('is_consolidated');
            $table->Integer('ppmp_part');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_purchased_items');
    }
};

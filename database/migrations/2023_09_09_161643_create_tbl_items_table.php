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
        Schema::create('tbl_items', function (Blueprint $table) {
            $table->id();
            $table->Integer('item_category_id');
            $table->String('item_code');
            $table->String('item_name');
            $table->String('item_description');
            $table->String('item_unit_measure');
            $table->String('item_price');
            $table->Integer('availability');
            $table->String('item_from');
            $table->Integer('item_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_items');
    }
};

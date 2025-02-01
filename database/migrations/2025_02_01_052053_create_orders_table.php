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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_category_id')->constrained(
                table: 'menu_categories'
            )->onUpdate('cascade')->onDelete('cascade')->required();
            $table->integer('menu_id')->constrained(
                table: 'menus'
            )->onUpdate('cascade')->onDelete('cascade')->required();
            $table->integer('outlet_id')->constrained(
                table: 'outlets'
            )->onUpdate('cascade')->onDelete('cascade')->required();
            $table->float('user_latitude')->required();
            $table->float('user_longitude')->required();
            $table->json('menu_choice_ids')->required();
            $table->integer('menu_price')->required();
            $table->integer('delivery_price')->required();
            $table->integer('total_price')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

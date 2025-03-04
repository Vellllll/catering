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
        Schema::create('menu_choices_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained(
                table: 'menus',
            )->onUpdate('cascade')->onDelete('cascade');
            $table->integer('menu_choice_id')->constrained(
                table: 'menu_choices'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_choices_menus');
    }
};

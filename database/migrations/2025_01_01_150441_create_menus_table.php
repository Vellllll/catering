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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('picture_url');
            $table->foreignId('menu_category_id')->constrained(
                table: 'menu_categories',
            )->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('price')->required();
            // $table->unsignedInteger('menu_category_id');
            $table->timestamps();

            // $table->foreign('menu_category_id')->references('id')->on('menu_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

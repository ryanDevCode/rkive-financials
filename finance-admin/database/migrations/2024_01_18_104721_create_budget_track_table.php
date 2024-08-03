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
        Schema::create('budget_track', function (Blueprint $table) {
            $table->id();

            // Track Info
            $table->unsignedBigInteger('track_id');
            $table->string('track_department');
            $table->string('track_category');
            $table->integer('track_amount');
            $table->date('track_date');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('track_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->foreign('track_department')->references('budget_department')->on('budgets')->onDelete('cascade');
            // $table->foreign('track_category')->references('category_code')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_track');
    }
};

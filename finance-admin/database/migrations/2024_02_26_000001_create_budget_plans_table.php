<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('department_id');
            $table->char('budget_period');
            $table->foreignId('creator');
            $table->unsignedBigInteger('user_id');
            $table->string('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_plans');
    }
};

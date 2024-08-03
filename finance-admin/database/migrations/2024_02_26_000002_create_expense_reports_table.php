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
        Schema::create('expense_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount');
            $table->string('category');
            $table->unsignedBigInteger('budget_plan_id');
            $table->unsignedBigInteger('department_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_reports');
    }
};

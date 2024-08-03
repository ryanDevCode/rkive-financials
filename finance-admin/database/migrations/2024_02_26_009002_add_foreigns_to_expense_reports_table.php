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
        Schema::table('expense_reports', function (Blueprint $table) {
            $table
                ->foreign('budget_plan_id')
                ->references('id')
                ->on('budget_plans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expense_reports', function (Blueprint $table) {
            $table->dropForeign(['budget_plan_id']);
            $table->dropForeign(['department_id']);
        });
    }
};

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
        Schema::table('budget_plans', function (Blueprint $table) {
            // Add the new 'amount' column after 'budget_period'
            $table->decimal('amount', 10, 2)->after('budget_period');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_plans', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
};

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
        Schema::create('travel_requests', function (Blueprint $table) {
            $table->id('travel_request_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('destination', 255);
            $table->string('project_title', 50)->nullable();
            $table->string('start_date', 50)->default('');
            $table->string('end_date', 50)->default('');
            $table->text('purpose');
            $table->decimal('estimated_amount', 8, 2);
            $table->string('attachment', 50)->nullable();
            $table->string('notes', 50)->nullable();
            $table->string('tr_track_no', 255);
            $table->string('status', 50)->nullable();
            $table->string('approver', 50)->nullable();
            $table->timestamps();

            $table->index('tr_track_no');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_requests');
    }
};
